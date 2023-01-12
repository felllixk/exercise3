<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->catalog_id = $request->catalog_id;
        $product->subcatalog_id = $request->subcatalog_id;
        $product->category_id = $request->category_id ?? null;
        $product->user_id = $request->user()->id;

        $product->save();

        return $product->id;
    }

    public function delete(DeleteProductRequest $request)
    {
        $request->validated();
        Product::destroy($request->id);
    }
}
