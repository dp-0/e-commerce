<?php

namespace App\Http\Controllers\admin;

use App\Enums\VoucherStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVoucherRequest;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(){
        if(session('status')){
            dd(session('status'));
        }
        $vouchers = Voucher::orderBy('created_at','desc')->paginate(10);
        return view('admin.voucher', compact('vouchers'));
    }
    public function create(){
        return view('admin.createVoucher');
    }

    public function store(StoreVoucherRequest $request){
        Voucher::create([
            'purchase_amount' => $request->purchase_amount,
            'voucher_amount' => $request->voucher_amount,
            'valid_up_to' => $request->valid_up_to
        ]);
        return redirect()->route('admin.voucher.index')->with(['status',"Voucher Create Successfully"]);
    }
    public function active($id){
        $voucher = Voucher::findOrFail($id);
        $voucher->update([
            'status'=>VoucherStatus::ACTIVATED->value
        ]);
        return redirect()->route('admin.voucher.index')->with(['status',"Voucher Activated Successfully"]);
    }
    public function deactive($id){
        $voucher = Voucher::findOrFail($id);
        $voucher->update([
            'status'=>VoucherStatus::DEACTIVATED->value
        ]);
        return redirect()->route('admin.voucher.index')->with(['status',"Voucher Deactivated Successfully"]);
    }
}
