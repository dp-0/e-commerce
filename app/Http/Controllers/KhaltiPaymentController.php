<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Order;
use App\Models\Voucher;
use App\traits\CalculateTotalAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KhaltiPaymentController extends Controller
{
    use CalculateTotalAmount;
    public function proceddToPayment(Request $request)
    {
        $cart = session()->get('cart');
        if(!$cart){
            return redirect()->back()->with('error', "Your Cart is Empty");
        }
        $purchaseOrderId = Str::random(10);
        $amount = $this->getTotalOrderAmountAfterVoucherApply() * 100;
        $amount = floor($amount);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
        "return_url": "' . route('verify.to.payment') . '",
        "website_url": "' . env('APP_URL') . '",
        "amount": "' . $amount . '",
        "purchase_order_id": "' . $purchaseOrderId . '",
        "purchase_order_name": "' . $purchaseOrderId . '"
        }
        ',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
                'Content-Type: application/json',
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return redirect($response->payment_url);
    }
    public function verifyPayment(Request $request)
    {
        $purchaseOrderId = $request->purchase_order_id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/lookup/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST =>  'POST',
        CURLOPT_POSTFIELDS =>'{
        "pidx": "'.$request->pidx.'"
        }

        ',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $data = json_decode($response);
    if($data->status == 'Completed'){
        $cart = session()->get('cart');
        $voucher = session()->get('voucher');
        if($voucher){
            $voucher = Voucher::where('code','=',$voucher['code'])->first();
            $voucher = $voucher->id;
        }
        $offer = null;
        if(session()->get('offer_id')){
            $offer = Offers::find(session()->get('offer_id'))->first();
        }
        $order = Order::create([
            'purchase_date_time' => now(),
            'purcharseOrderId' => $purchaseOrderId,
            'purcharse_amount' => $this->getTotalOrderAmountAfterVoucherApply(),
            'voucher_id' => $voucher,
            'offer_id' => session()->get('offer_id'),
            'user_id' => Auth::id()
        ]);

        foreach($cart as $id => $product){
            $product_price = $product['price'];
            if($offer){
                $product_price = $product['price'] - ($product['price'] * $offer->offer_percentange / 100);
            }
            $order->products()->attach($id, ['amount'=>$product_price]);
        }
        session()->remove('cart');
        session()->remove('voucher');
        session()->remove('offer_id');
        return redirect()->route('user.orders')->with('error', "Order Completed");
    }
    return redirect()->back()->with('error', "Payment Not Completed");
  
    }
}
