<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  
    protected $fillable = ['image','category_name'];
    
    public function products(){
        return $this->hasMany("App\Product",'categories_id');
    }
    public function brand()
    {
        return $this->belongsToMany('App\Brand');
    }

    
}
