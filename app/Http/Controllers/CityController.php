<?php

namespace App\Http\Controllers;

use App\Handlers\CityHandler;
use Illuminate\Http\JsonResponse;

class CityController extends AbstractController
{
    public function search(?string $search): JsonResponse
    {
        return app(CityHandler::class)->search($search);
    }
}
