<?php

namespace Tests\Feature;

use App\Models\Fixture;
use Ramsey\Collection\Collection;
use Tests\TestCase;

class CitySearchTest extends TestCase
{
    public function testSearchCity()
    {
        $expected = collect([
            'ams'    => 'Amsterdam',
            'singa'  => 'Singapore',
            'eeuwar' => 'Leeuwarden'
        ]);

        $expected->each(function (string $value, string $key) {
            $response = collect(
                $this->get(route('cities.search', ['search' => $key]))
                    ->assertSuccessful()
                    ->json()
            );
            $this->assertArrayHasKey($value, array_flip($response->pluck('name')->toArray()));
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
            $response = collect(
                $this->get(route('cities.search', ['search' => $key]))
                    ->assertSuccessful()
                    ->json()
            );
            $this->assertArrayHasKey($value, array_flip($response->pluck('country.name')->toArray()));
        });
    }
}
