<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Order_product;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('frontend.shipping_info');
    }

    public function storeOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'total' => $request->total,
            'status' => $request->status
        ]);
        foreach (Cart::all() as $item) {
            Order_Product::create([
                'order_id' => $order->id,
                // 'product_id' => $item->model->id,
                 'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
        }
    }
}
