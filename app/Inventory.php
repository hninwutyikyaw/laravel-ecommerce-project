<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['product_id','type','price','quantity','order_id'];
  
    public function product(){
        return $this->belongsTo("App\Product");
    }
}
