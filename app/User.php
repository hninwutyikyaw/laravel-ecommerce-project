<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_image','name', 'email', 'password','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->admin;
    }
  
    public function address() {
        return $this->hasMany('App\Address');
    }

    public function orderproduct(){        
        return $this->hasMany('App\Order_product');   
    }

    public function order() {
        return $this->hasMany('App\Order');
    }

    public function cart(){
        return $this->hasOne('App\Cart');
    }

    public function wishlist(){
       return $this->hasMany('App\Wishlist');
    }

    public function review(){
        return $this->hasOne('App\Review');
    }

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function reply(){
        return $this->hasMany('App\Comment');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
