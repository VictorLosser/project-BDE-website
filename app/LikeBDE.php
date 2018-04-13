<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeBDE extends Model
{
    protected $table = "likes-bde";

    public function likeable(){
        return $this->morphTo();
    }

    protected $fillable = [
        'likeable_id','likeable_type','user_id',
    ];
}
