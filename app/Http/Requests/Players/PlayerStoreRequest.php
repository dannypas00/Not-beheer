<?php

namespace App\Http\Requests\Players;

use App\Http\Requests\AbstractRequest;

class PlayerStoreRequest extends AbstractRequest
{
    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            '_token' => 'sometimes',
            'id' => 'sometimes|int',
            'name' => 'required|string|unique:players',
            'file' => 'sometimes|nullable|mimes:jpeg,png'
        ];
    }
}
