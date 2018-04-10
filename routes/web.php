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

    $priceAVG = DB::table('products')->avg('price');

    $products = DB::table('products')
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

Route::get('/produit/{product}', function ($id) {

    $product = DB::table('products')->find($id);

    return view('product', compact('product'));
});

Route::get('/ajouter-un-produit', function () {
    return view('product_management.add');
});

Route::post('/ajouter-un-produit/nouveau-produit', 'products@store');

Route::get('/supprimer-un-produit', function () {
    $products = DB::table('products')->get();


    return view('product_management.delete',
        compact('products'));
});

Route::get('/modifier-un-produit', function () {

    $products = DB::table('products')
        ->select('id', 'title')
        ->get();

    return view('product_management.modify',
        compact('products'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{oui}', function ($id) {

    $users = DB::table('users')->get();
    dd($users);

});
