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

Route::group('/v1', function () : void {
    Route::group('/players', function () : void {
        Route::get('/index', 'PlayerController@index');
        Route::delete('/delete', 'PlayerController@destroy');
        Route::post('/create', 'PlayerController@create');
        Route::get('/show', 'PlayerController@show');
        Route::put('/update', 'PlayerController@update');
    });
});
