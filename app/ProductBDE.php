<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBDE extends Model
{
    protected $table = "product-bde";
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'title', 'description', 'price', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\ProductCategoryBDE', 'category_id');
    }

    public function orders() {
        return $this->belongsToMany('App\OrdersBDE', 'contain-product-bde', 'product_id', 'order_id')
            ->withPivot('quantity')
            ->as('containProduct')
            ->withTimestamps()
            ->using('App\ContainProductBDE');
    }

    public function images(){
        return $this->morphMany('App\ImageBDE','imageable');
    }

}
