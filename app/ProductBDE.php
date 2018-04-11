<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBDE extends Model
{
    protected $table = "products";

    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'image', 'price', 'category_id'
    ];
}
