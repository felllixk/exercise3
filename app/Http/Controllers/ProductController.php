<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\GetBySlugProductRequest;
use App\Http\Requests\Product\IndexProductsRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\IndexProductsResource;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(IndexProductsRequest $request)
    {
        $request->validated();
        $query = Product::query();

        $perPage = 10;


        if ($request->filled('slug')) {
            $slug = Str::slug($request->slug); // В конечно итоге всё равно переводим в слаг
            $query->where('slug', 'like', "%$slug%");
        }

        if ($request->filled('amount.min')) {
            $query->where('amount', '>=', $request->amount['min']);
        }

        if ($request->filled('amount.max')) {
            $query->where('amount', '<=', $request->amount['max']);
        }

        if ($request->filled('catalog_id')) {
            $query->where('catalog_id', '=', $request->catalog_id);
        }

        if ($request->filled('subcatalog_id')) {
            $query->where('subcatalog_id', '=', $request->subcatalog_id);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', '=', $request->category_id);
        }

        if ($request->filled('characteristics.*')) {
            $query->whereHas('characteristic', function ($q) use ($request) { // Берём продукты которые имеют характеристики
                foreach ($request->characteristics as $characteristic) { // Динамично перебираем дополнительные характеристики
                    $q->where('characteristics.name', '=', $characteristic['name']);
                    if (isset($characteristic['value'])) {
                        $q->Where('characteristics.value', '=', $characteristic['value']);
                    }
                }
            });
        }

        if ($request->filled('per_page')) {
            $perPage = $request->per_page;
        }

        $products = $query->paginate($perPage);

        return IndexProductsResource::collection($products);
    }

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
