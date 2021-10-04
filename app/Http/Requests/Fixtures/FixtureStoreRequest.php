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
        return [
            'id' => 'sometimes|int',
            'name' => 'required|string',
            'file' => 'sometimes|nullable|mimes:jpeg,png'
        ];
    }
}
