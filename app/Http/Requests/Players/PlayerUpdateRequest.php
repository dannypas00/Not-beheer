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
            '_method' => 'required',
            '_token' => 'required',
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
