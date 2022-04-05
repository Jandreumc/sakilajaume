<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SakilaController;

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

Route::get('/formbusq', 'App\Http\Controllers\SakilaController@formbusq');
Route::get('/grafico', 'App\Http\Controllers\SakilaController@grafico');
Route::post('formbusq/grafico', 'App\Http\Controllers\SakilaController@graficobusqueda');
Route::get('formbusq/grafico1', 'App\Http\Controllers\SakilaController@graficobusqueda1');


Route::resource('films', SakilaController::class);
