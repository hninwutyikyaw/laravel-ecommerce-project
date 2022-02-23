<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $table = 'order_product';
    
    protected $fillable=['product_id','order_id','qty','total'];

    public function orders(){
        return $this->belongsTo('App\order','order_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->hasMany('App\Product','product_id');
    }
}
