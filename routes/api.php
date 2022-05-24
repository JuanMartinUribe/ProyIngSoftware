<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/games', 'App\Http\Controllers\Api\GameApi@index')->name("api.game.index");
Route::get('/games/paginate', 'App\Http\Controllers\Api\GameApi@paginate')->name("api.game.paginate");
Route::get('/games/{id}', 'App\Http\Controllers\Api\GameApi@show')->name("api.game.show");
