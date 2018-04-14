<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContainProductBDE extends Pivot
{
    protected $table = "contain-product-bde";

    protected $fillable = [
        'quantity','product_id','order_id',
    ];

}
