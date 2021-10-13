<?php

namespace Tests\Feature;

use App\Models\Fixture;
use App\Repositories\CityRepository;
use Illuminate\Support\Facades\Artisan;
use Ramsey\Collection\Collection;
use Tests\TestCase;

class CitySearchTest extends TestCase
{
    public function testSearchCity()
    {
        Artisan::call('migrate:fresh --seed');
        $expected = collect([
            'ams'    => 'Amsterdam',
            'singa'  => 'Singapore',
            'eeuwar' => 'Leeuwarden'
        ]);

        $expected->each(function (string $value, string $key) {
            //$response = $this->get(route('cities.search', ['search' => $key]))->assertSuccessful();
            $response = app(CityRepository::class)->findCitiesWithCountry($key);
            dd([$key, $value, $response, route('cities.search', ['search' => $key])]);
            $this->assertEquals($value, $response->json('name'));
        });
    }

    public function testSearchCityCountry()
    {
        $expected = collect([
            'ams'    => 'Netherlands',
            'singa'  => 'Singapore',
            'eeuwar' => 'Netherlands'
        ]);

        $expected->each(function (string $value, string $key) {
            $response = $this->get(route('cities.search', ['search' => $key]))->assertSuccessful();
            $this->assertEquals($value, $response->json('country.name'));
        });
    }
}
