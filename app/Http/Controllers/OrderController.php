<?php

namespace App\Http\Controllers;

use App\Http\Enums\OrderStatus;
use App\Http\Requests\Order\StoreGuestOrderRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $user = $request->user();
        $baskets = $user->baskets;
        if (count($baskets) == 0) {
            return response()->json(['error' => 'Ваша корзина пуста'], 400);
        }

        $productIds = [];
        foreach ($baskets as $basket) {
            /**
             * Можно было бы использовать метод product на каждой итерации.
             * Но для оптимизации, я вызову всего одним запросом ниже
             */
            $productIds[] = $basket['product_id'];
        }

        $products = Product::findMany($productIds);
        $order = new Order();
        $order->name = $user->name;
        $order->email = $user->email;
        $order->user_id = $user->id;
        $order->products = $products->toJson();
        $order->amount = $products->sum('amount');
        $order->setStatus(OrderStatus::waiting);
        $order->save();

        foreach ($baskets as $basket) { // Удаляем всё из корзины после создания заказа
            $basket->delete();
        }

        return $order->id;
    }

    public function storeGuest(StoreGuestOrderRequest $request)
    {
        $request->validated();

        $productIds = [];
        foreach ($request->products as $product) {
            $productIds[] = $product['id'];
        }
        $orderAmount = Product::findMany($productIds)->sum('amount');
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->products = json_encode($request->products);
        $order->amount = $orderAmount;
        $order->setStatus(OrderStatus::waiting);
        $order->save();

        return $order->id;
    }
}
