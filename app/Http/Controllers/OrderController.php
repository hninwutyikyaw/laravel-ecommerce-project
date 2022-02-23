<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Order::with(['product', 'order_product'])
            ->get();
        return view('admin.order.index', compact('orders'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'delivered' => 'required',
        ]);
        Order::create($request->all());
        return redirect()->route('admin.order.index')
            ->with('success', 'Category added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::FindOrFail($id);
        $orders =  DB::table('order_product')
            ->leftJoin('products', 'order_product.product_id', "=", 'products.id')
            ->leftJoin('orders', 'order_product.order_id', "=", 'orders.id')
            ->where('orders.user_id', $order->user_id)
            ->get();
        return view('admin.order.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::findorFail($id);
        return view('admin.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        $orders->total = $request->input('total');
        $orders->delivered = $request->input('delivered');
        $orders->update();

        return redirect()->route('adminorder.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        DB::table('order_product')->where('order_id', $order->id)->delete();
        return redirect()->route("adminorder.index")->with('status', 'Data deleted for order');
    }
}
