<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBDE extends Model
{
    protected $table = "image-bde";

    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\ProductBDE', 'product_id', 'product_id');
    }

    public function usersLike(){
        return $this->belongsToMany('App\User', 'like-image-bde', 'image_id', 'id');
    }

    public function usersPost(){
        return $this->belongsTo('App\User','id','id');
    }

    public function events(){
        return $this->belongsTo('App\EventsBDE','event_id','event_id');
    }

    public function comments(){
        return $this->hasMany('App\CommentsBDE','image_id','image_id');
    }
}
