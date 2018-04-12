<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function imagesPosted(){
        return $this->hasMany('App\ImageBDE','id','id');
    }

    public function imagesLiked(){
        return $this->belongsToMany('App\ImageBDE', 'like-image-bde', 'id', 'image_id');
    }

    public function orders(){
        return $this->hasMany('App\OrdersBDE','id','id');
    }

    public function status(){
        return $this->belongsTo('App\StatusBDE','status_id','status_id');
    }

    public function events(){
        return $this->hasMany('App\EventsBDE','id','id');
    }

    public function comments(){
        return $this->hasMany('App\CommentsBDE','id','id');
    }

    public function eventsLiked(){
        return $this->belongsToMany('App\EventsBDE', 'like-event-bde', 'id', 'event_id');
    }

    public function eventsParticipated(){
        return $this->belongsToMany('App\EventsBDE', 'participates-bde', 'event_id', 'id');
    }

    public function ideas(){
        return $this->hasMany('App\IdeaBoxBDE','id','id');
    }

    public function ideasLiked(){
        return $this->belongsToMany('App\IdeaBoxBDE','like-idea-bde','id','idea_box_id');
    }
    public function isauthorized(){
        $statu = $this[0]->status_id;
        return $statu;
    }

}
