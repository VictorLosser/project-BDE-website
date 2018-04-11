<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsBDE extends Model
{
    protected $table = "events-bde";

    public $timestamps = false;

    /*Sans le fillable, ca ne marche po ! LAISSEZ LE WE NEED IT*/
    protected $fillable = [
        'title', 'description', 'date_event', 'price', 'recurrence', 'id',
    ];
}
