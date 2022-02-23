<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{   
   
    protected $fillable = ['id','image','categories_id', 'brands_id', 'p_name', 'description', 'price'];
    
    public function category(){
        return $this->belongsTo('App\Category','categories_id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand','brands_id');
    }
    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
    public function order_product()
    {
        return $this->belongsToMany('App\Order_product');
    }
    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }   
}
