<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersBDE extends Model
{
    protected $table = "orders-bde";

    public $timestamps = false;

    public function products() {
        return $this->belongsToMany('App\ProductBDE', 'contain-product-bde', 'order_id', 'product_id')
            ->withPivot('quantity')
            ->as('contain-product-bde');
    }

    public function usersOrder(){
        return $this->belongsTo('App\User','id','id');
    }
}
