<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBDE extends Model
{
    protected $table = "product-bde";

    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'price', 'category_id'
    ];
}
