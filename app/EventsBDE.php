<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsBDE extends Model
{
    protected $table = "events-bde";

    public function users(){
        return $this->belongsTo('App\User','id','id');
    }

    public function usersParticipate(){
        return $this->belongsToMany('App\User', 'participates-bde', 'event_id', 'id');
    }

    public function likes(){
        return $this->morphMany('App\LikeBDE', 'likeable');
    }

    public function comments(){
        return $this->morphMany('App\CommentsBDE','commentable');
    }

    public function images(){
        return $this->morphMany('App\ImageBDE','imageable');
    }

    /*Sans le fillable, ca ne marche po ! LAISSEZ LE WE NEED IT*/
    protected $fillable = [
        'title', 'description', 'date_event', 'price', 'recurrence', 'id',
    ];

}
