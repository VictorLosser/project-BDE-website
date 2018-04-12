<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainProductBDE extends Model
{
    protected $table = "contain-product-bde";

    protected $fillable = [
        'quantity','product_id','order_id',
    ];
}
