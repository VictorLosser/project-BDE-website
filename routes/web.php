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
    'produit' => 'ProductController',
    'idee' => 'IdeeController',
    'evenement' => 'EventController',
    'participate' => 'ParticipateController',
    'commande' =>'OrderController'
]);

Route::get('/commande/panier','OrderController@show');
Route::post('comande/validation','OrderController@update');


Route::get('/produits', 'ProductController@shows');
Route::get('/produits/productsData', 'ProductController@productsData');
Route::get('/produits/indexdata', 'ProductController@indexData');

Route::get('/downloadPDF/{eventID}','ParticipateController@downloadPDF');
Route::get('/downloadCSV/{eventID}','CsvController@downloadCSV');


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

Route::resource('comment', 'CommentController')->only([
    'store', 'destroy'
]);
Route::resource('image', 'ImageController')->only([
    'store', 'destroy'
]);
Route::resource('like', 'LikeController')->only([
    'store', 'destroy'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mentions-legales', function () {
    return view('mentions');
});
