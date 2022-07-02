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

Route::group(['namespace' => 'Rugby'], function () {
    Route::get('rugby', 'RugbyPlayerController@index');
    Route::get('rugby/{id}', 'RugbyPlayerController@show');
});

Route::group(['namespace' => 'Nba'], function () {
    Route::get('nba', 'NbaPlayerController@index');
    Route::get('nba/{id}', 'NbaPlayerController@show');
});