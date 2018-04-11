<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsBDE extends Model
{
    protected $table = "events-bde";

    public $timestamps = false;

    public function images(){
        return $this->hasMany('App\ImageBDE', 'event_id','event_id');
    }

    public function comments(){
        return $this->hasMany('App\CommentsBDE','event_id','event_id');
    }

    public function users(){
        return $this->belongsTo('App\User','id','id');
    }

    public function usersLike(){
        return $this->belongsToMany('App\User', 'like-image-bde', 'event_id', 'id');
    }

    public function usersParticipate(){
        return $this->belongsToMany('App\User', 'participates-bde', 'event_id', 'id');
    }

    /*Sans le fillable, ca ne marche po ! LAISSEZ LE WE NEED IT*/
    protected $fillable = [
        'title', 'description', 'date_event', 'price', 'recurrence', 'id',
    ];

}
