<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable =['product_id','user_id','rating','headline','description'];

    public function user(){
        return $this->belongsTo('App\User');
        }
}
