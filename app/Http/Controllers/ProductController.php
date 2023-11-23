<?php

namespace App\Http\Controllers;

use App\Enums\OfferStatus;
use App\Http\Resources\ProductResource;
use App\Models\Offers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        return view('welcome');
    }
    public function getProduct(){
        $products = Product::paginate(10);
        $offer = Offers::where('status','=', OfferStatus::Available->value)->Where('valid_up_to','>=',now())->first();

        $combinedProducts = $products->map(function ($product) use ($offer) {
            $combinedProduct = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'status' => $product->status,
                'photo' => $product->photo,
                'offer' => $offer ? [
                    'title' => $offer->title,
                    'percentage' => $offer->offer_percentange,
                ] : null,
            ];
    
            return $combinedProduct;
        });
        return  ProductResource::collection($combinedProducts);
    }
}
