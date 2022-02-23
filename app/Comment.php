<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_name','blogs_id','user_id','comment'];

    
    public function blogs(){
        return $this->belongsTo('App/Blog');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
 