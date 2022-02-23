<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Inventory;
use App\Product;
use App\Order;

class DashboardController extends Controller
{
    public function registered(){
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }
    public function registeredit(Request $request, $id){
        $users = User::FindOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->admin= $request->input('isadmin');
        $users->update();
        return redirect('/role-register')->with('status','Your Data is updated.');
    }
    public function registerdelete($id){
        $users = User::FindOrfail($id);
        $users->delete();
        return redirect('/role-register')->with('status','Your data is deleted');
    }

    public function total_stock(){
        
        $products = Product::all();

        $products = $products->each(function($product) {
            $in = Inventory::where([
                ['type','in'],
                ['product_id', $product->id]
            ])->sum('quantity');
             
            $out = Inventory::where([
                ['type', 'out'],
                ['product_id', $product->id]
            ])->sum('quantity');

            $product->in = $in;
            $product->out = $out;
            $product->stock = $in-$out;

            return $product;
        });
        return view("admin.inventory_stock", compact('products'));
    }

    public function dashboard(){

    $customerCount = User::where('admin')->count();
    $orderCount = Order::count();

    $products = Product::all();

    $inventory = Inventory::where([
                ['type','in'],
        ])
        ->get();
        $inventory->map(function ($item) {
            $item->total = $item->price * $item->quantity;
            return $item;
        });
        
        $total1 = $inventory->sum('total');
        
    $inventories = Inventory::where([
                ['type','in'],
                ])
                ->get();

    $total = $inventories->sum('price');

    $inventories = Inventory::where([
        ['type','out'],
        ])
        ->get();

    $totalOut = $inventories->sum('price');

    $products = Product::all();
    $totalPrice = $products->sum('price');       
    $net=$totalPrice-$total;
    
   return view('admin.dashboard', compact('customerCount','net','totalPrice','orderCount','totalOut','total','inventory','total1'));
}     
    
    }

