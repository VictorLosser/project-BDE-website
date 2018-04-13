<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsBDE extends Model
{
    protected $table = "comments-bde";

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function commentable(){
        return $this->morphTo();
    }

    protected $fillable = [
        'content','id','commentable_id','commentable_type',
    ];
}
