<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventsBDE extends Model
{
    protected $table = "events-bde";
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function usersParticipate(){
        return $this->belongsToMany('App\User', 'participates-bde', 'event_id', 'user_id');
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
        'title', 'description', 'date_event', 'price', 'recurrence', 'user_id',
    ];



}
