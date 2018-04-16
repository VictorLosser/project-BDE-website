<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBDE extends Model
{
    protected $table = "status-bde";

    protected $dates = ['created_at','updated_at'];

    public function users(){
        return $this->hasMany('App\User','status_id');
    }
    protected $fillable = [
        'status',
    ];
}
