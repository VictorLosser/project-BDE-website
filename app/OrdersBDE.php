<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersBDE extends Model
{
    protected $table = "orders-bde";

    protected $dates = ['created_at','updated_at'];

    public function products() {
        return $this->belongsToMany('App\ProductBDE', 'contain-product-bde', 'order_id', 'product_id')
            ->withPivot('quantity')
            ->as('containProduct')
            ->withTimestamps()
            ->using('App\ContainProductBDE');
    }

    public function usersOrder(){
        return $this->belongsTo('App\User','user_id');
    }

    protected $fillable = [
        'total_price','order_date','user_id',
    ];
}
