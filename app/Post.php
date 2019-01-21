<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'postTitle', 'postDescription'];


    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
