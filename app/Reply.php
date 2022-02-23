<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['comment_id','name','user_id','reply','blog_id'];

    public function comments(){
        return $this->belongsTo('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function blog(){
        return $this->belongsTo('App\Blog');
    }
}
