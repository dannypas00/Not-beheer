<?php

namespace App\Handlers;

use App\Repositories\CityRepository;
use Illuminate\Http\JsonResponse;

class CityHandler
{
    public function search(?string $search): JsonResponse
    {
        $collection = app(CityRepository::class)->findCitiesWithCountry($search);
        return new JsonResponse($collection);
    }
}
