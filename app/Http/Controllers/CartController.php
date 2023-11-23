<?php

namespace App\Http\Controllers;

use App\Enums\OfferStatus;
use App\Enums\VoucherStatus;
use App\Models\Offers;
use App\Models\Product;
use App\Models\Voucher;
use App\traits\CalculateTotalAmount;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use CalculateTotalAmount;
    public function index(Request $request)
    {
        // session()->remove('cart');
        $totalAmount = $this->getTotalOrderAmountAfterVoucherApply();
        $offer = Offers::where('status', '=', OfferStatus::Available->value)->Where('valid_up_to', '>=', now())->first();
        return view('cart', compact('offer', 'totalAmount'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {
            return redirect()->back()->with('success', 'Product already exists in Cart!');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if ($cart[$request->id]) {
                $cart = session()->get('cart');
                if($request->quantity <1){
                    unset($cart[$request->id]);
                }else{
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
                }
               
                
            }
        }
        session()->flash('success', 'Product not Found');
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                if ($cart[$request->id]['quantity'] > 1) {
                    $cart[$request->id]['quantity'] = $cart[$request->id]['quantity'] - 1;
                } else {
                    unset($cart[$request->id]);
                }
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        session()->flash('success', 'Product not Found');
    }

    public function applyVoucher(Request $request)
    {
        $voucher = Voucher::where('code', '=', $request->code)
        ->where('status', '=', VoucherStatus::ACTIVATED->value)
        ->Where('valid_up_to', '>=', now())
            ->first();
        if (!$voucher) {
            session()->flash('success', 'Voucher Not Found');
            session()->remove('voucher');
            return redirect()->route('cart');
        }
        $total = $this->getTotalOrderAmount();
        if ($total < $voucher->purchase_amount) {
            session()->flash('success', 'Voucher not accepted');
            session()->remove('voucher');
            return redirect()->route('cart');
        }
        session()->put('voucher', ['code' => $voucher->code, 'voucherAmount' => $voucher->voucher_amount]);
        session()->flash('success', 'Voucher applied Successfully');
        return redirect()->route('cart');
    }
}
