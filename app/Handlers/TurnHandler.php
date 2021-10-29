<?php

namespace App\Handlers;

use App\Http\Requests\Turns\TurnStoreRequest;
use App\Http\Requests\Turns\TurnIndexRequest;
use App\Models\Leg;
use App\Models\Turn;
use App\Repositories\TurnRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TurnHandler
{
    /**
     * @param TurnIndexRequest $request
     * @return string|false
     * @throws \JsonException
     */
    public function index(TurnIndexRequest $request): bool|string
    {
        $turns = app(TurnRepository::class)->all();
        return json_encode($turns, JSON_THROW_ON_ERROR);
    }

    /**
     * @param TurnStoreRequest $request
     * @return Response
     */
    public function store(TurnStoreRequest $request): Response
    {
        try {
            $data = app(TurnRepository::class)->createTurn($request);
            if ($data instanceof Leg) {
                return new Response(['leg' => $data]);
            }
            return new Response(['score_remaining' => $data]);
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * @param Turn $turn
     * @return Response
     */
    public function destroy(Turn $turn): Response
    {
        try {
            app(TurnRepository::class)->delete($turn);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
