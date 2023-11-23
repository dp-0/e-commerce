<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $id = Auth::id();
        $orders = Order::where('user_id','=',$id)->paginate(10);
        return view('user.order',compact('orders'));
    }
    public function product($id){

        $order = Order::where('id','=',$id)->where('user_id','=',Auth::id())->first();
        return view('user.orderProduct',compact('order'));
    }
    public function viewProduct($id){
        $product = Product::findOrFail($id);
        $order = $product->order->first();
        if($order->purchase_date_time->diffInHours(now()) >= 24){
            return view('user.expired');
        }
        return  view('user.viewProduct', compact('product'));
    }
}
