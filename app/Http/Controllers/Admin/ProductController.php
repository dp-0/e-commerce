<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $token = session('token');
        $products = Product::paginate(10);
        return view('admin.product', ['token' => $token,'products'=>$products]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimes:pdf,mp4,mov,ogg,qt|max:20000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 202);
        }
        $validator = $validator->validate();
        $photoPath = $request->file('photo')->storePublicly('photo','public');
        $filePath = $request->file('file')->storePublicly('file','public');
        Product::create([
            'photo' => $photoPath,
            'name' => $validator['name'],
            'type' => $validator['type'],
            'price' => $validator['price'],
            'url' => $filePath,
            'description' => $validator['description'],
            'status' => ProductStatus::Available->value
        ]);
        return response()->json([
            'message' => 'Product Created Successfully',
        ], 200);
    }

    public function viewProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:products',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 202);
        }
        $validator = $validator->validate();
        
        $product = Product::findOrFail($validator['id']);

        return new ProductResource($product);
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $product->delete();

        return redirect()->route('admin.product.index',['message' => 'Product deleted successfully.']);
    }
}
