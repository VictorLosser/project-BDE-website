<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipatesBDE extends Model
{
    protected $table = "participates-bde";

    protected $fillable = [
        'event_id','user_id',
    ];
}
