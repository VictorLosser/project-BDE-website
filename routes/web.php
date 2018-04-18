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

Route::get('/', 'WelcomeController@getPopularProducts');

Route::resources([
    'produit' => 'productController',
    'idee' => 'ideeController',
    'evenement' => 'eventController',
    'participate' => 'ParticipateController',
    'commande' =>'OrderController'
]);


Route::get('/produits', 'productController@shows');
Route::get('/produits/productsData', 'productController@productsData');
Route::get('/produits/indexdata', 'productController@indexData');

Route::get('/downloadPDF/{eventID}','ParticipateController@downloadPDF');


Route::get('/evenements', function () {
   $events = EventsBDE::all();
    return view('events', compact('events'));
});
Route::get('/evenements/indexdata', 'EventController@indexData');


Route::get('/idees', function () {
    $idees = IdeaBoxBDE::all();
    return view('idees', compact('idees'));
});
Route::get('/idees/indexdata', 'IdeeController@indexData');

Route::resource('comment', 'commentController')->only([
    'store', 'destroy'
]);
Route::resource('image', 'imageController')->only([
    'store', 'destroy'
]);
Route::resource('like', 'likeController')->only([
    'store', 'destroy'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mentions-legales', function () {
    return view('mentions');
});
