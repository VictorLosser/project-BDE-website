<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsBDE extends Model
{
    protected $table = "comments-bde";
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function commentable(){
        return $this->morphTo();
    }

    protected $fillable = [
        'content','user_id','commentable_id','commentable_type',
    ];


}
