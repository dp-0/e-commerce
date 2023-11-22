<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OfferStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOfferRequest;
use App\Models\Offers;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        $offers =  Offers::paginate(10);
        return view('admin.offer', compact('offers'));
    }

    public function create(){
        return view('admin.createOffer');
    }

    public function store(StoreOfferRequest $request){

        Offers::create([
            'title' => $request->title,
            'description' => $request->description,
            'offer_percentange' => $request->offer_percentange,
            'valid_up_to' => $request->valid_up_to
        ]);
        return redirect()->route('admin.offer.index')->with(['status',"Offer Create Successfully"]);
    }

    public function expired($id){
        $voucher = Offers::findOrFail($id);
        $voucher->update([
            'status'=>OfferStatus::Expired->value
        ]);
        return redirect()->route('admin.offer.index')->with(['status',"Offer Deactivated Successfully"]);
    }

    public function active($id){
        $voucher = Offers::findOrFail($id);
        $voucher->update([
            'status'=>OfferStatus::Available->value
        ]);
        return redirect()->route('admin.offer.index')->with(['status',"Offer Activated Successfully"]);
    }
}
