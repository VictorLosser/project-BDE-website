<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBDE extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $table = "image-bde";

    protected $fillable = [
        'image_link','alt','imageable_id','imageable_type','id','user_id',
    ];

    public function usersPost(){
        return $this->belongsTo('App\User','user_id');
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
