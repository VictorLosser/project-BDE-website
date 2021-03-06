<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeBDE extends Model
{
    protected $table = "likes-bde";

    protected $dates = ['created_at','updated_at'];

    public function likeable(){
        return $this->morphTo();
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    protected $fillable = [
        'likeable_id','likeable_type','user_id',
    ];
}
