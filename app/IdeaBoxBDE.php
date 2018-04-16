<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaBoxBDE extends Model
{
    protected $table = "idea-box-bde";
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function likes(){
        return $this->morphMany('App\LikeBDE', 'likeable');
    }

    public function comments(){
        return $this->morphMany('App\CommentsBDE','commentable');
    }

    protected $fillable = [
        'title','description','user_id',
    ];
}
