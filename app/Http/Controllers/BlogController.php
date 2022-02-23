<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.blog.index", compact("blogs"));
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
        $blogs = new Blog();

        $blogs->name=$request->input('name');
        $blogs->blog_paragraph=$request->input('blog_paragraph');
        $blogs->title=$request->input('title');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $blogs->image =$filename;
        } else {
            return $request;
            $blogs->image ="";
        }
        $blogs->save();
        return redirect()->route('blog.index')
            ->with('success', 'Blog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blog::findorFail($id);
        return view('admin.blog.edit',compact('blogs'));
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
        $blogs = Blog::find($id);

        $blogs->name=$request->input('name');
        $blogs->blog_paragraph=$request->input('blog_paragraph');
        $blogs->title=$request->input('title');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $blogs->image =$filename;
        } 
        $blogs->save();
        return redirect()->route('blog.index')
            ->with('success', 'Blog added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $blogs->delete();
        return redirect()->route("blog.index")->with('status', 'Data deleted for blog');
    }
}
