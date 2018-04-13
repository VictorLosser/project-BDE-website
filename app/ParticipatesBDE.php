<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ParticipatesBDE extends Pivot
{
    protected $table = "participates-bde";

    protected $fillable = [
        'event_id','user_id',
    ];
}
