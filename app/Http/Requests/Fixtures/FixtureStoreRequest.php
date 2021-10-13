<?php

namespace App\Http\Requests\Fixtures;

use App\Http\Requests\AbstractRequest;

class FixtureStoreRequest extends AbstractRequest
{
    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return array_merge($this->defaultRules, [
            'player_1' => 'required|int|exists:players,id',
            'player_2' => 'required|int|exists:players,id',
            'type' => 'required|string',
            'style' => 'required|string',
            'length' => 'required|int',
            'start_score' => 'required|int',
            'date_time' => 'required|date',
            'location' => 'required|exists:city,id'
        ]);
    }
}
