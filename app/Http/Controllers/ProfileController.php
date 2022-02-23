<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Order_product;
use App\Address;
use App\User;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function orders()
    {
        $user_id = Auth::user()->id;
        // $orders = Order_product::with(['orders','product'])
        //     ->where('orders.user_id', '=', $user_id)->get();
        $orders = DB::table('order_product')
            ->leftJoin('products', 'products.id', '=', 'order_product.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
            ->where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }

    public function address()
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->limit(1)->get();     
        return view('profile.address', compact('address'));
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'addressline' => 'required|min:10',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|min:4|numeric'

        ]);
        $user_id = Auth::user()->id;
        DB::table('addresses')->where('user_id', $user_id)
            ->update($request->except('_token'));
        return back()->with('msg', 'Your address has been updated.');
    }

    public function password()
    {
        return view('profile.updatePassword');
    }
    
    public function updatepassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        if (!Hash::check($oldPassword, Auth::user()->password)) {
            return back()->with('msg', 'The specified password does not match to database password');
        } else {
            $request->user()->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            return back()->with('msg', 'Password has been updated');
        }
    }

    public function userImage_edit(Request $request, $id){
        $users = User::FindOrFail($id);
        return view('profile.user_image_edit')->with('users',$users);
    }

    public function Image()
    {
        $user = Auth::user()->all();     
        return view('profile.user_image', compact('user'));
    }

    public function updateimage(Request $request, $id){
 
        // if($request->hasFile('user_image')){
        //     $user_image = $request->file('user_image');
        //    $user_imagename = time() .'.'.$user_image->getClientOriginalExtension();
        //     Image::make($user_image)->resize(300, 300)->save( public_path('/images/' . $user_imagename ) );

        //     $user = Auth::user();
        //     $user->user_image = $user_imagename;
        //     $user->save();
        // }

        // return view('profile.index', array('user' => Auth::user()) );

    

     $users = User::find($id);

        // $blogs->name=$request->input('name');
        // $blogs->blog_paragraph=$request->input('blog_paragraph');
        // $blogs->title=$request->input('title');

        // if ($request->hasfile('user_image')) {
        //     $user_imageuploaded = $request->file("user_image");
        //   $user_imagename = time() .'.'.$user_imageuploaded->getClientOriginalExtension();
        //     $user_imagepath=public_path('/images/');
        //     $user_imageuploaded->move($user_imagepath,$user_imagename);
        //     $users->user_image = $user_imageuploaded;
        // } 
        // $users->save();
        // return back();

 
        if(request()->has('user_image')){
            $user_imageuploaded = request()->file('user_image');
            $user_imagename = time() .'.'.$user_imageuploaded->getClientOriginalExtension();
            $user_imagepath=public_path('/images/');
            $user_imageuploaded->move($user_imagepath,$user_imagename);
            $users->user_image = $user_imageuploaded;    
        }
         $users->update();
        return back();


 
    }
     

}
