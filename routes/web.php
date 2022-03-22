<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about','App\Http\Controllers\HomeController@about')->name("home.about"); 
Route::get('/games','App\Http\Controllers\GameController@index')->name("game.index");
Route::get('/games/showtopsellers','App\Http\Controllers\GameController@showTopSellers')->name("game.showtopsellers");
Route::get('/games/showmostpopular','App\Http\Controllers\GameController@showMostPopular')->name("game.showmostpopular");
Route::get('/games/showcheapgames','App\Http\Controllers\GameController@showCheapGames')->name("game.showcheapgames");
Route::get('/games/showrecentgames','App\Http\Controllers\GameController@showRecentGames')->name("game.showrecentgames");
Route::get('/games/{id}','App\Http\Controllers\GameController@show')->name("game.show");
Route::get('/article/create/{relatedGameId}/{relatedUserId}','App\Http\Controllers\ArticleController@create')->name("article.create");
Route::get('/articles/{id}','App\Http\Controllers\ArticleController@show')->name("article.show");  
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add"); 
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::post('/article/save','App\Http\Controllers\ArticleController@save')->name("article.save");
Route::post('/comment/save','App\Http\Controllers\CommentController@save')->name("comment.save");
Route::post('/comment/delete','App\Http\Controllers\CommentController@delete')->name("comment.delete");
Route::post('/article/delete','App\Http\Controllers\ArticleController@delete')->name("article.delete");
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");
Route::get('/admin/creategame', 'App\Http\Controllers\AdminController@createGame')->name("game.admincreate");
Route::get('/admin/createarticle', 'App\Http\Controllers\AdminController@createArticle')->name("article.admincreate");
Route::get('/admin/gameindex','App\Http\Controllers\AdminController@gameIndex')->name("game.adminindex");
Route::get('/admin/articleindex', 'App\Http\Controllers\AdminController@articleIndex')->name("article.adminindex");
Route::post('/admin/savegame', 'App\Http\Controllers\AdminController@saveGame')->name("game.save");
Route::post('/admin/savearticle', 'App\Http\Controllers\AdminController@saveArticle')->name("article.adminsave");
Route::post('/article/delete','App\Http\Controllers\ArticleController@delete')->name("article.delete");
Route::post('/games/delete','App\Http\Controllers\GameController@delete')->name("game.delete");
Auth::routes();


