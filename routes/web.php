<?php

use Illuminate\Http\Request;
use App\EventsBDE;
use App\IdeaBoxBDE;

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
Route::get('/idees', function () {
    $idees = IdeaBoxBDE::all();
    return view('idees', compact('idees'));
});

Route::resources([
    'produit' => 'productController',
    'idee' => 'ideeController',
    'evenement' => 'eventController',
    'commande' =>'OrderController'
]);
Route::resource('comment', 'commentController')->only([
    'store', 'destroy'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mentions-legales', function () {
    return view('mentions');
});
