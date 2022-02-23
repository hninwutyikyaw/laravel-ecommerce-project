<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_image'=> ['required', 'image','mimes:png,jpg,jpeg' ,'max:2048']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(request()->has('user_image')){
            $user_imageuploaded = request()->file('user_image');
            $user_imagename = time() .'.'.$user_imageuploaded->getClientOriginalExtension();
            $user_imagepath=public_path('/images/');
            $user_imageuploaded->move($user_imagepath,$user_imagename);
            return User::create([
                 'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_image'=>'/images/' .$user_imagename,
            ]);        
        }


     return User::create([
        'user_image'=> $data['user_image'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

 }
    //    protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }


// public function user_imagestore(Request $request)
//     {
//         $users = new User();


//         if ($request->hasfile('user_image')) {
//             $file = $request->file("user_image");
//             $extension = $file-> getClientOriginalExtension();
//             $filename = time() . ".".$extension;
//             $file->move(public_path('images'), $filename);
//             $blogs->image =$filename;
//         } else {
//             return $request;
//             $users->user_image ="";
//         }
//         $users->save();
//         return redirect()->route('home');
            
//     }

     

}