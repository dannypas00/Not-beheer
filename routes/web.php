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

Route::get('/geotest', function () {
    $client = new \GuzzleHttp\Client();

    $header = [
        'x-rapidapi-host' => 'wft-geo-db.p.rapidapi.com',
        'x-rapidapi-key'  => 'b706efe108msha6bbf7eeb50b598p1420d4jsn2b1097440c2e'
    ];
    $urlBase = (new \GuzzleHttp\Psr7\Uri('https://wft-geo-db.p.rapidapi.com'))
        ->withPath('/v1/geo/cities')
        ->withQuery(http_build_query([
            'limit'  => 10,
            'offset' => 0
        ]));
    //$request = new \GuzzleHttp\Psr7\Request('GET', $urlBase, $header, null);
    dd(json_decode($client->get($urlBase, ['headers' => $header])->getBody()->getContents()));
});
