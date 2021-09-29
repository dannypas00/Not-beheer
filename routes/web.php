<?php

use App\Http\Controllers\PlayersController;
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

Route::get('/', function () {
    return redirect('/players');
});

Route::resource('players', PlayersController::class)
    ->only(['index', 'create', 'store', 'destroy']);

Route::resource('fixtures', \App\Http\Controllers\FixturesController::class)
    ->only(['index', 'create', 'store','destroy']);

Route::get('/export', function () {
    return view('export.index');
});

Route::get('/fixtures', function () {
    return view('fixtures.index');
});

Route::get('/statistics', function () {
    return view('statistics.index');
});
