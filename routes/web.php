<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TurnController;
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
//    Route::get('{id}', [StatisticController, 'show'])->name('statistics.show');
});

Route::group(['prefix' => 'fixtures'], function () {
    Route::get('', [FixtureController::class, 'index'])->name('fixtures.index');
    Route::get('create', [FixtureController::class, 'create'])->name('fixtures.create');
    Route::get('{id}', [FixtureController::class, 'show'])->name('fixtures.show');
    Route::delete('{id}/destroy', [FixtureController::class, 'destroy'])->name('fixtures.destroy');
});

Route::group(['prefix' => 'turns'], function () {
    Route::get('', [TurnController::class, 'index'])->name('turns.index');
    Route::get('{id}', [TurnController::class, 'show'])->name('turns.show');
    Route::post('store', [TurnController::class, 'store'])->name('turns.store');
    Route::delete('{id}/destroy', [TurnController::class, 'destroy'])->name('turns.destroy');
});

Route::group(['prefix' => 'players'], function () {
    Route::get('', [PlayerController::class, 'index'])->name('players.index');
    Route::get('create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('store', [PlayerController::class, 'store'])->name('players.store');
    Route::delete('{player}/destroy', [PlayerController::class, 'destroy'])->name('players.destroy');
    Route::get('{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('{player}/update', [PlayerController::class, 'update'])->name('players.update');
});
