<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBDE extends Model
{
    protected $table = "image-bde";

    public function usersPost(){
        return $this->belongsTo('App\User','id','id');
    }

    public function likes(){
        return $this->morphMany('App\LikeBDE', 'likeable');
    }

    public function imageable(){
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany('App\CommentsBDE','commentable');
    }
}
