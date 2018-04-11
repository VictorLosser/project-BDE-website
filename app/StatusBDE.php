<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBDE extends Model
{
    protected $table = "status-bde";

    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\User','status_id','status_id');
    }
}
