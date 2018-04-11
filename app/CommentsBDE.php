<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsBDE extends Model
{
    protected $table = "comments-bde";

    public $timestamps = false;

    public function images(){
        return $this->belongsTo('App\ImageBDE','event_id','event_id');
    }

    public function events(){
        return $this->belongsTo('App\EventsBDE','event_id','event_id');
    }

    public function users(){
        return $this->belongsTo('App\User','id','id');
    }
}
