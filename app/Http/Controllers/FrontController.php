<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Brand;

use App\Product;
use App\Wishlist;
use App\Cart;
use App\Order;
use App\Address;
use App\Inventory;
use App\Order_product;
use App\Blog;
use App\Comment;

use App\Review;
use Session;
use App\Reply;

class FrontController extends Controller
{
    public function home()
    {
        $arrival = Product::orderBy('created_at','desc')
                    ->take(11)
                    ->get();

        $blogs = Blog::orderBy('created_at','desc')
                    ->take(4)
                    ->get();
       
        $categories = Category::all();
         
        // return view('frontend.home', compact('products','arrival','blogs','cats'));
        return view('frontend.home', compact('arrival','blogs','categories'));
    }



    public function search(Request $request)
    {
        $searchData = $request->searchData;
        $products =Product::where('p_name', 'like', '%' . $searchData . '%')->get();   
            return view('frontend.searchcontent', ['products' => $products]);
    }

    public function blog_search(Request $request)
    {
        $searchData = $request->searchData;
        $blogs =Blog::where('title', 'like', '%' . $searchData . '%')->get();   
            return view('frontend.blog_search', ['blogs' => $blogs]);
    }

    public function detailPro($id)
    {
        
        $product = Product::with(['category', 'brand','inventory'])
                ->where('id', $id)
                ->first(); 
           
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


        $rate = Review::where('product_id', $product->id)->avg('rating');
            
        $compare = Product::where('id',$id)->first();
        
        session([ 
            'total' => $compare,
            'stock'=>$in-$out,
        ]);


        $cart_count = 0;

         if(\Auth::check()){
            $cart_count = Cart::where(['product_id' => $product->id,'user_id' => \Auth::user()->id])->count();
            $counts = Wishlist::where(['product_id' => $product->id,'user_id' =>\Auth::user()->id])->count();
            $count = Review::where(['product_id' => $product->id,'user_id' => \Auth::user()->id])->count(); 
        }

         $review = $product->reviews()->simplePaginate(3);
         $count_review =  $product->reviews()->count();

        // return view('frontend.product_detail', compact('product','rate','user_name','total','stock','cart_count', 'count','counts','review','count_review'));
        return view('frontend.product_detail', compact('product','rate','cart_count', 'count','counts','review','count_review'));

    }

    public function showCates($id)
    {
        $category_products = Product::with('category')->where('categories_id', $id)
                            ->get();
        return view('frontend.category_list_pro', compact('category_products'));
    }
    public function showBrands($id)
    {
        $brand_products = Product::with('brand')->where('brands_id', $id)
                        ->get();
        return view('frontend.brand_list_pro', compact('brand_products'));
    }

    public function view_wishlist()
    {
        $products = Wishlist::with('product')->where('user_id', Auth::user()->id)->get();   
            return view('frontend.wishlist', compact('products'));
    }

    public function addWishlist(Request $request)
    {

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        return redirect('/wishlist');
    }

    public function removeWishlist($id)
    {
        $wishlists = Wishlist::where('product_id', '=', $id)->delete();
        return back()->with('status', 'Item Removed from Wishlist');
    }

    public function view_cart()
    {
        $cart = Cart::with(['products', 'user'])->where('user_id', Auth::user()->id)->get();
        $cart->map(function ($item) {
            $item->total = $item->products->price * $item->quantity;
            return $item;
        });

        $total = $cart->sum('total');
        $quantities = $cart->sum('quantity');

        session([ 
            'total' => $total,
            'quantities' => $quantities,
        ]);
  
        return view('cart.index', compact('cart', 'total', 'quantities'));
    }

    public function addcardItem(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();
    
        return redirect('/cart');
    }

    public function removecardslist($id)
    {
        $carts = Cart::where('id', '=', $id)->delete();
        return back()->with('status', 'Item Removed from cart');
    }

    

    public function storeOrder(Request $request)
    {
        $cart = Cart::with(['products', 'user'])->where('user_id', Auth::user()->id)->get();

        $cart->map(function ($item) {
            $item->total = $item->products->price * $item->quantity;
            return $item;
        });

        $total = $cart->sum('total');
        $quantities = $cart->sum('quantity');

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total' => $total,
            'delivered' => '0'
        ]);

        $cart->each(function ($item) use ($order) {
            Order_product::create([
                'product_id' => $item->product_id,
                'order_id' => $order->id,
                'qty' => $item->quantity,
                'total' => $item->total,
            ]);
            // 
            Inventory::create([
                'product_id'=>$item->product_id,
                'type'=>"out",
                'price'=>$item->total,
                'order_id'=>$order->id,
                'quantity' =>$item->quantity,
                ]);  

            $cart_delete = Cart::where('user_id', Auth::user()->id);   
            $cart_delete->delete();

        return redirect('/role-register')->with('status','Your data is deleted');
        });

        $request->session()->forget(['total', 'quantities']);
        return view('frontend.thanksyou');
    }

    public function orderConfirm(Request $request)
    {
        $shipping_address = Address::where('user_id', Auth::user()->id)
            ->latest()
            ->first();

        return view('frontend.order_confirm', compact('shipping_address'));
    }
    public function detailBlog($id)
    {
        $blog = Blog ::where('id', $id)
            ->first(); 

        $comments = Comment::where('blogs_id', $blog->id)->simplepaginate(3);
          $replys = Reply::where('blog_id' , $blog->id)->simplepaginate(3);
       /*  $replys = Reply::where(['comment_id' => $comment->id,'blog_id' => $blog->id])->simplepaginate(3);*/

        return view('frontend.blog', compact('blog','comments','replys'));
    }
    public function allproducts(Request $request)
    {
        $query = Product::orderBy('created_at', 'desc');
        if ($request->min_price && $request->max_price) {
            $query = $query->where('price', '>=', $request->min_price);
            $query = $query->where('price', '<=', $request->max_price);
        }
        $products = $query->paginate(9);
        return view('frontend.allproducts', compact('products'));
    }

    public function allBlog (Request $request){
        $blogs = Blog::paginate(6);
        return view('frontend.allBlog',compact('blogs'));
    }

    public function compareSearch(Request $request)
    {
        $searchData = $request->searchData;
        $search = Product::where('p_name', 'like', '%' . $searchData . '%') ->get();

        $product = Product::all();
      
        return view('frontend.compare', ['search' => $search], compact('product'));
    }

}

