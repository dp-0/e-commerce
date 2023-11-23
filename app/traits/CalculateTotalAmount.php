<?php

namespace App\traits;

use App\Enums\OfferStatus;
use App\Enums\VoucherStatus;
use App\Models\Offers;
use App\Models\Voucher;

trait CalculateTotalAmount
{
    public function getTotalOrderAmount(): float|int
    {
        $cart = session()->get('cart');
        $total = 0;
       if($cart){
           $offer = Offers::where('status', '=', OfferStatus::Available->value)->Where('valid_up_to', '>=', now())->first();
           foreach ($cart as $id => $details){
               $product_price = $details['price'];
               if ($offer) {
                   $product_price = $details['price'] - ($details['price'] * $offer->offer_percentange / 100);
               }
               $total +=  $product_price * $details['quantity'];
           }
       }
        return $total;
    }
    public function getTotalOrderAmountAfterVoucherApply(){
        $voucher = session()->get('voucher');
      
        $total = $this->getTotalOrderAmount();
        if($voucher){
            $voucher = Voucher::where('code','=',$voucher['code'])
                ->where('status', '=', VoucherStatus::ACTIVATED->value)
                ->Where('valid_up_to', '>=', now())
                ->first();
            if(!$voucher){
                session()->remove('voucher');
            }
            if($total >= $voucher->purchase_amount){
                $total = $total - $voucher->voucher_amount;
            }
        }
        return $total;
    }
}
