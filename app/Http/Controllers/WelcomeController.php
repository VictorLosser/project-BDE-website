<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContainProductBDE;
use App\ProductBDE;

class WelcomeController extends Controller
{

    function getPopularProducts(){

        $products = ProductBDE::all();

        /*
        $pop = ContainProductBDE::groupBy('product_id')
            ->selectRaw('sum(quantity) as total_quantity, product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(3)
            ->pluck('total_quantity', 'product_id');
        */

        $pop = DB::select('SELECT SUM(quantity) as total_quantity, product_id, title, description, image_link,alt FROM `contain-product-bde` LEFT JOIN `product-bde` ON `product-bde`.id = `contain-product-bde`.product_id LEFT JOIN `image-bde` ON `image-bde`.imageable_id = `product-bde`.id WHERE `image-bde`.`imageable_type` = "product" GROUP BY product_id ORDER BY total_quantity DESC LIMIT 3');

        return view('welcome',
            compact('products','pop')
        );
    }

}
