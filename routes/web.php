<?php

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

Route::get('/produits', function () {

    $products = DB::table('products')->get();
    $priceAVG = DB::table('products')->avg('price');

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

Route::get('/produit/{product}', function ($id) {

    $product = DB::table('products')->find($id);

    return view('product', compact('product'));
});

Route::get('/ajouter-un-produit', function () {
    return view('product_management.add');
});

Route::get('/supprimer-un-produit', function () {
    return view('product_management.delete');
});

Route::get('/modifier-un-produit', function () {
    return view('product_management.modify');
});