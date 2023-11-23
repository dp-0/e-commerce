<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->middleware(['auth:sanctum','can:is_admin'])->group(function(){
    Route::post('/product',[ProductController::class,'store']);
    Route::get('/product',[ProductController::class,'viewProduct']);
});


Route::get('/product',[ControllersProductController::class, 'getProduct']);