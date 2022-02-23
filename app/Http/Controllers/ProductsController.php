<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('admin.product.index', compact("products"));
    }
    public function productSearch(Request $request)
    {
        $searchData = $request->searchData;
        $products = DB::table('products')
            ->leftJoin('brands','products.brands_id','=','brands.id')
            ->leftJoin('categories','products.categories_id','=','categories.id')
            ->where('p_name', 'like', '%' . $searchData . '%')
            ->get();
        return view('admin.product.search', ['products' => $products]);
    }

    public function create()
    {
        //
        // $categories = Category::pluck("category_name","id");

        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'categories_id' => 'required',
            'brands_id' => 'required',
            'p_name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'image' => $new_name,
            'categories_id' => $request->categories_id,
            'brands_id' => $request->brands_id,
            'p_name' => $request->p_name,
            'description' => $request->description,
            'price' => $request->price
        );
        Product::create($form_data);
        return redirect()->route("product.index")->with('success', 'Data Added successfuly');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $products = Product::FindOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }

    public function update(Request $request, $id)
    {

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'image' => 'image|max:2048',
                'categories_id' => 'required',
                'brands_id' => 'required',
                'p_name' => 'required',
                'description' => 'required',
                'price' => 'required'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'categories_id' => 'required',
                'brands_id' => 'required',
                'p_name' => 'required',
                'description' => 'required',
                'price' => 'required'
            ]);
        }
        $form_data = array(
            'image' => $image_name,
            'categories_id' => $request->categories_id,
            'brands_id' => $request->brands_id,
            'p_name' => $request->p_name,
            'description' => $request->description,
            'price' => $request->price
        );
        Product::whereId($id)->update($form_data);
        return redirect()->route("product.index")->with('status', 'Data Added for products');
    }

    public function destroy(Product $products, $id)
    {
        //
        $products = Product::FindOrFail($id);
        $products->delete();
        return redirect()->route("product.index")->with('status', 'Data deleted for products');
    }
}
