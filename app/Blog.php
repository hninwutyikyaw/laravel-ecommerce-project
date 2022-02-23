<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['image', 'name', 'blog_paragraph'];
    
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
