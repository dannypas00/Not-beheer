<?php

namespace App\Http\Requests\Players;

use App\Http\Requests\AbstractRequest;

class PlayerUpdateRequest extends AbstractRequest
{
    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int|exists:players,id',
            'name' => 'required|string',
            'file' => 'sometimes|nullable|mimes:jpeg,png'
        ];
    }
}
