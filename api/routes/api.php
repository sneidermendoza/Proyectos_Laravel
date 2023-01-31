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
// Clientes
Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');

// Servicios
Route::get('/services', 'App\Http\Controllers\ServiceController@index');
Route::post('/services', 'App\Http\Controllers\ServiceController@store');
Route::get('/services/{service}', 'App\Http\Controllers\ServiceController@show');
Route::put('/services/{service}', 'App\Http\Controllers\ServiceController@update');
Route::delete('/services/{service}', 'App\Http\Controllers\ServiceController@destroy');

// attach/detach clients/service
Route::post('/clients/service', 'App\Http\Controllers\ClientController@attach');
Route::post('/clients/service/detach', 'App\Http\Controllers\ClientController@detach');
// attach/detach service/clients
Route::post('/services/clients', 'App\Http\Controllers\ServiceController@clients');
//Route::post('/services/clients/detach', 'App\Http\Controllers\ServiceController@detach');

