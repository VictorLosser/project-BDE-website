<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryBDE extends Model
{
    protected $table = "product-category-bde";

    public function products(){
        return $this->hasMany('App\ProductBDE','category_id', 'category_id');
    }

    protected $fillable = [
        'category_name',
    ];
}
