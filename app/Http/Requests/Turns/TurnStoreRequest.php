<?php

namespace App\Http\Requests\Turns;

use App\Http\Requests\AbstractRequest;

class TurnStoreRequest extends AbstractRequest
{
    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'player' => 'required|string',
            'leg' => 'required|int',
            'throw_1' => 'required|string',
            'throw_2'=> 'required|string',
            'throw_3'=> 'required|string'
        ];
    }
}
