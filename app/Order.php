<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $fillable=['total','delivered','user_id'];

    public function order_product(){
        return $this->hasMany('App\Order_product','order_id','product_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsToMany ('App\Product') ->withPivot('qty','total');
    }
    public function orderproduct(){
        return $this->hasMany('App\Order_product');
    }

   
    
}
