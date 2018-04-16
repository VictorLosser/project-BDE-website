<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContainProductBDE extends Pivot
{
    protected $table = "contain-product-bde";
    protected $dates = ['created_at','updated_at'];

    protected $fillable = [
        'quantity','product_id','order_id',
    ];

}
