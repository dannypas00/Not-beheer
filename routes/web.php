<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatisticsController;
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

Route::get('/matches', function () {
    return view('matches.index');
});

Route::group(['prefix' => 'statistics'], function () {
    Route::get('{gameid}', [StatisticsController::class, 'find'])->name('statistics.find');
});
Route::get('/statistics', function () {
    return view('statistics.index');
});

Route::group(['prefix' => 'cities'], function () {
    Route::get('search/{search}', [CityController::class, 'search'])->name('cities.search');
});

Route::group(['prefix' => 'fixtures'], function () {
    Route::get('', [FixtureController::class, 'index'])->name('fixtures.index');
    Route::get('create', [FixtureController::class, 'create'])->name('fixtures.create');
    Route::get('fixture', [FixtureController::class, 'fixture'])->name('fixtures.fixture');
    Route::post('store', [FixtureController::class, 'store'])->name('fixtures.store');
    Route::delete('{fixture}/destroy', [FixtureController::class, 'destroy'])->name('fixtures.destroy');
});

Route::group(['prefix' => 'players'], function () {
    Route::get('', [PlayerController::class, 'index'])->name('players.index');
    Route::get('create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('store', [PlayerController::class, 'store'])->name('players.store');
    Route::delete('{player}/destroy', [PlayerController::class, 'destroy'])->name('players.destroy');
    Route::get('{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('{player}/update', [PlayerController::class, 'update'])->name('players.update');
});
<<<<<<< HEAD
?>
=======
>>>>>>> e1d5d95a8beb14f7625a1b6da07cd63209cdd659
