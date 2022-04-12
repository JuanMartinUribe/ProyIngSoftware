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
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about"); 
Route::get('/games', 'App\Http\Controllers\GameController@index')->name("game.index");
Route::get('/games/showtopsellers', 'App\Http\Controllers\GameController@showTopSellers')->name("game.showTopSellers");
Route::get('/games/showmostpopular', 'App\Http\Controllers\GameController@showMostPopular')->name("game.showMostPopular");
Route::get('/games/showcheapgames', 'App\Http\Controllers\GameController@showCheapGames')->name("game.showCheapGames");
Route::get('/games/showrecentgames', 'App\Http\Controllers\GameController@showRecentGames')->name("game.showRecentGames");
Route::get('/games/{id}', 'App\Http\Controllers\GameController@show')->name("game.show");
Route::get('/article/create/{relatedGameId}/{relatedUserId}', 'App\Http\Controllers\ArticleController@create')->name("article.create");
Route::get('/articles/{id}', 'App\Http\Controllers\ArticleController@show')->name("article.show");  
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add"); 
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::post('/article/save', 'App\Http\Controllers\ArticleController@save')->name("article.save");
Route::post('/comment/save', 'App\Http\Controllers\CommentController@save')->name("comment.save");
Route::post('/comment/delete', 'App\Http\Controllers\CommentController@delete')->name("comment.delete");
Route::post('/article/delete', 'App\Http\Controllers\ArticleController@delete')->name("article.delete");

Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name("admin.index");
Route::get('/admin/gameindex', 'App\Http\Controllers\Admin\GameController@index')->name("admin.gameIndex");
Route::get('/admin/articleindex', 'App\Http\Controllers\Admin\ArticleController@index')->name("admin.articleIndex");
Route::get('/admin/creategame', 'App\Http\Controllers\Admin\GameController@create')->name("admin.createGame");
Route::get('/admin/createarticle', 'App\Http\Controllers\Admin\ArticleController@create')->name("admin.createArticle");

Route::get('/admin/game/edit/{id}', 'App\Http\Controllers\Admin\GameController@edit')->name("admin.gameEdit");
Route::post('/admin/game/save', 'App\Http\Controllers\Admin\GameController@save')->name("admin.gameSave");
Route::post('/admin/games/update', 'App\Http\Controllers\Admin\GameController@update')->name("admin.gameUpdate");
Route::post('/admin/games/delete', 'App\Http\Controllers\Admin\GameController@delete')->name("admin.gameDelete");

Route::get('/admin/article/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@edit')->name("admin.articleEdit");
Route::post('/admin/article/save', 'App\Http\Controllers\Admin\ArticleController@save')->name("admin.articleSave");
Route::post('/admin/article/delete', 'App\Http\Controllers\Admin\ArticleController@delete')->name("admin.articleDelete");
Route::post('/admin/articles/update', 'App\Http\Controllers\Admin\ArticleController@update')->name("admin.articleUpdate");

Auth::routes();


