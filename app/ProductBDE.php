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

    public function images(){
        return $this->hasMany('App\ImageBDE', 'product_id','product_id');
    }

    public function category(){
        return $this->belongsTo('App\ProductCategoryBDE', 'category_id', 'category_id');
    }

    public function orders() {
        return $this->belongsToMany('App\OrdersBDE', 'contain-product-bde', 'product_id', 'order_id')
            ->withPivot('quantity');
    }
}
