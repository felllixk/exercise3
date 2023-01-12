<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\DeleteBasketRequest;
use App\Http\Requests\Basket\EditBasketRequest;
use App\Http\Requests\Basket\StoreBasketRequest;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        return BasketResource::collection($request->user()->basket);
    }

    public function store(StoreBasketRequest $request)
    {
        $request->validated();
        $basket = new Basket();
        $basket->product_id = $request->product_id;
        $basket->user_id = $request->user()->id;
        $basket->count   = $request->count ?? 1;
        $basket->save();

        return $basket->id;
    }

    public function edit(EditBasketRequest $request)
    {
        $request->validated();
        $basket = Basket::whereProductId($request->product_id)->firstOrFail();
        $basket->count = $request->count;
        $basket->save();
        return $basket->id;
    }

    public function destroy(DeleteBasketRequest $request)
    {
        $request->validated();
        return Basket::whereProductId($request->product_id)->delete();
    }
}
