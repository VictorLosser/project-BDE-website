<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryBDE extends Model
{
    protected $table = "product-category-bde";

    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\ProductBDE','category_id', 'category_id');
    }
}
