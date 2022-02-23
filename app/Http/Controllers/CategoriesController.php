<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();

        $categories->category_name=$request->input('category_name');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $categories->image =$filename;
        } else {
            return $request;
            $categories->image ="";
        }
        $categories->save();
        return redirect()->route('category.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::findorFail($id);
        return view('admin.category.edit')->with('categories', $categories);
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
        $categories =Category::find($id);

        $categories->category_name=$request->input('category_name');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $categories->image =$filename;
        } 
        $categories->save();
        return redirect()->route('category.index')
            ->with('success', 'Category added successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categories, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route("category.index")->with('status', 'Data deleted for categories');
    }
}
