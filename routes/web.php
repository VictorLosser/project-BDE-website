<?php

use Illuminate\Http\Request;
use App\ProductBDE;
use App\EventsBDE;
use App\ImageBDE;
use App\ContainProductBDE;

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

Route::get('/produits', 'productController@shows');
Route::get('/produits/categorie', 'productController@showCategory');


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

Route::get('/mentions-legales', function () {
    return view('mentions');
});
