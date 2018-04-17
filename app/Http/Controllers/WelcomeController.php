<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContainProductBDE;
use App\ProductBDE;

class WelcomeController extends Controller
{

    function getPopularProducts(){

        $products = ProductBDE::all();

        $pop = ContainProductBDE::groupBy('product_id')
            ->selectRaw('sum(quantity) as total_quantity, product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(3)
            ->pluck('total_quantity', 'product_id');

        return view('welcome',
            compact('products','pop')
        );
    }

}
