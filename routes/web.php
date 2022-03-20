<?php

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
Route::get('/games/showtopsellers','App\Http\Controllers\GameController@showTopSellers')->name("game.showtopsllers");
Route::get('/games/{id}','App\Http\Controllers\GameController@show')->name("game.show");
Route::get('/article/create/{relatedGameId}/{relatedUserId}','App\Http\Controllers\ArticleController@create')->name("article.create");
Route::get('/articles/{id}','App\Http\Controllers\ArticleController@show')->name("article.show");   
Route::post('/article/save','App\Http\Controllers\ArticleController@save')->name("article.save");

Auth::routes();


