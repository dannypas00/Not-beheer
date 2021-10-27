<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbstractRequest;

class LegController extends AbstractRequest
{
    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'set_id' => 'sometimes|required',
            'winner' => ''
        ];
    }
}
