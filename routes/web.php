<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HomeController;

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

Route::get('/allblacks', [PlayerController::class, 'show']);
Route::get('/allblacks/{id}', [PlayerController::class, 'show']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/{any}', function() {
    return view('home');
});

