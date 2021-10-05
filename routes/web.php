<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\PlayerController;
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
    return redirect(route('players.index'));
});

Route::get('/export', function () {
    return view('export.index');
});

Route::get('/statistics', function () {
    return view('statistics.index');
});

Route::group(['prefix' => 'fixtures'], function () {
    Route::get('index', [FixtureController::class, 'index'])->name('fixtures.index');
    Route::get('create', [FixtureController::class, 'create'])->name('fixtures.create');
    Route::post('store', [FixtureController::class, 'store'])->name('fixtures.store');
    Route::delete('{fixture}/destroy', [FixtureController::class, 'destroy'])->name('fixtures.destroy');
});

Route::group(['prefix' => 'players'], function () {
    Route::get('index', [PlayerController::class, 'index'])->name('players.index');
    Route::get('create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('store', [PlayerController::class, 'store'])->name('players.store');
    Route::delete('{player}/destroy', [PlayerController::class, 'destroy'])->name('players.destroy');
    Route::put('update', [PlayerController::class, 'update'])->name('players.update');
});
