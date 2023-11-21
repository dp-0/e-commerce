<?php

use App\Http\Controllers\admin\VoucherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->middleware(['can:is_admin'])->group(function () {
       Route::get('/dashboard', function (){
           return view('admin.dashboard');
       })->name('admin.dashboard');

       Route::get('/product',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product.index');
       Route::delete('/products', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.destroy');

       Route::get('/voucher',[VoucherController::class, 'index'])->name('admin.voucher.index');
       Route::get('/voucher/create',[VoucherController::class, 'create'])->name('admin.voucher.create');
       Route::post('/voucher/create',[VoucherController::class, 'store'])->name('admin.voucher.store');
       Route::get('/voucher/active/{id}',[VoucherController::class, 'active'])->name('admin.voucher.active');
       Route::get('/voucher/deactive/{id}',[VoucherController::class, 'deactive'])->name('admin.voucher.deactive');
    });
});

require __DIR__.'/auth.php';
