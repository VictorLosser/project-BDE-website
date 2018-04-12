<?php

use Illuminate\Http\Request;
use App\ProductBDE;
use App\EventsBDE;
use App\ImageBDE;

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
    $priceAVG = ProductBDE::avg('price');
    $products = ProductBDE::
        when($request->orderBy, function ($query) use ($request) {
            return $query->orderBy($request->orderBy);
        })
        ->get();

    return view('products',
        compact('products'),
        compact('priceAVG'));
});

Route::get('/evenements', function () {
   $events = EventsBDE::all();
    return view('events', compact('events'));
});

Route::resources([
    'produit' => 'productController',
    'evenement' => 'eventController'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
