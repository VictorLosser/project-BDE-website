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
        'password', 'remember_token','status_id'
    ];

    public function imagesPosted(){
        return $this->hasMany('App\ImageBDE','user_id');
    }

    public function orders(){
        return $this->hasMany('App\OrdersBDE','user_id');
    }

    public function status(){
        return $this->belongsTo('App\StatusBDE','status_id');
    }

    public function events(){
        return $this->hasMany('App\EventsBDE','user_id');
    }

    public function comments(){
        return $this->hasMany('App\CommentsBDE','user_id');
    }

    public function eventsParticipated(){
        return $this->belongsToMany('App\EventsBDE', 'participates-bde', 'user_id', 'event_id');
    }

    public function ideas(){
        return $this->hasMany('App\IdeaBoxBDE','user_id');
    }

    public function likes(){
        return $this->hasMany('App\LikeBDE','user_id');
    }
    public function isauthorized(){
        $status = $this->status_id;

        switch($status){
            case 1 : return 'free';
            case 2 : return 'Bde';
            case 3 : return 'Salarié';
        }
    }

}
