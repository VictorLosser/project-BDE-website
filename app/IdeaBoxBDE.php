<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaBoxBDE extends Model
{
    protected $table = "idea-box-bde";

    public $timestamps = false;

    public function users(){
        return $this->belongsTo('App\User', 'id','id');
    }

    public function ideasLiked(){
        return $this->belongsToMany('App\User','like-idea-bde','idea_box_id','id');
    }
}
