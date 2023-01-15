<?php

namespace App\Http\Controllers;

use App\Http\Enums\OrderStatus;
use App\Http\Requests\Order\IndexGuestOrderRequest;
use App\Http\Requests\Order\StoreGuestOrderRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->orders;
    }

    public function indexGuest(IndexGuestOrderRequest $request)
    {
        return Order::whereEmail($request->email)->whereUserId(null)->get();
    }

    public function store(StoreOrderRequest $request)
    {
        $user = $request->user();
        $baskets = $user->baskets;
        if (count($baskets) == 0) {
            return response()->json(['error' => 'Ваша корзина пуста'], 400);
        }

        $productIds = [];
        $amount = 0;
        foreach ($baskets as $basket) {
            $productIds[] = $basket->product_id;
            $amount += $basket->count * $basket->product->amount;
        }

        $order = new Order();
        $order->name = $user->name;
        $order->email = $user->email;
        $order->user_id = $user->id;
        $order->baskets = $baskets->toArray();
        $order->amount = $amount;
        $order->setStatus(OrderStatus::waiting);
        $order->save();

        Basket::whereUserId($user->id)->delete();

        return $order->id;
    }

    public function storeGuest(StoreGuestOrderRequest $request)
    {
        $request->validated();

        $orderAmount = 0;
        $baskets = $request->baskets;
        foreach ($baskets as &$basket) {
            $product = Product::find($basket['product_id']);
            $orderAmount += $product->amount * $basket['count'];
            unset($basket['product_id']);
            $basket['product'] = $product->toArray();
        }
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->baskets = $baskets;
        $order->amount = $orderAmount;
        $order->setStatus(OrderStatus::waiting);
        $order->save();

        return $order->id;
    }
}
