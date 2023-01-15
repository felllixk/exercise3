<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\DeleteBasketRequest;
use App\Http\Requests\Basket\EditBasketRequest;
use App\Http\Requests\Basket\StoreBasketRequest;
use App\Http\Requests\Basket\StoreManyBasketRequest;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        return BasketResource::collection($request->user()->baskets);
    }

    public function store(StoreBasketRequest $request)
    {
        $request->validated();
        $baskets = $request->user()->baskets;

        if ($basket = $baskets->firstWhere('product_id', $request->product_id)) {
            $basket->count += $request->count ?? 1;
            $basket->save();
            return $basket->id;
        }

        $basket = new Basket();
        $basket->product_id = $request->product_id;
        $basket->user_id = $request->user()->id;
        $basket->count   = $request->count ?? 1;
        $basket->save();

        return $basket->id;
    }

    public function storeMany(StoreManyBasketRequest $request)
    {
        $request->validated();
        $user = $request->user();
        $baskets = $request->baskets;
        foreach ($baskets as &$basket) {
            $basket['user_id'] = $user->id;
        }
        Basket::upsert($baskets, ['product_id', 'user_id'], ['count']);
        return 1;
    }

    public function edit(EditBasketRequest $request)
    {
        $request->validated();
        $basket = Basket::find($request->id);
        $basket->count = $request->count;
        $basket->save();
        return $basket->id;
    }

    public function destroy(DeleteBasketRequest $request)
    {
        $request->validated();
        return Basket::destroy($request->id);
    }
}
