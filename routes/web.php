<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});

Route::get('/produits', function (Request $request) {
    $priceAVG = DB::table('product-bde')->avg('price');
    $products = DB::table('product-bde')
        ->when($request->orderBy, function ($query) use ($request) {
            return $query->orderBy($request->orderBy);
        })
        ->get();
    return view('products',
        compact('products'),
        compact('priceAVG'));
    /*		compact('tasks'),
            [
                'firstname' => 'Victor',
                'lastname' => 'Losser'
            ]
        )->with('site', 'Boutique SWAG');*/
});

Route::resource('produit', 'productController');