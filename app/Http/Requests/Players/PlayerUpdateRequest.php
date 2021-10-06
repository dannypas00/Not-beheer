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
            '_method' => 'sometimes',
            '_token' => 'sometimes',
            'id' => 'required|int|exists:players,id',
            'name' => 'required|string|unique:players',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route()->parameter('player')
        ]);
    }
}
