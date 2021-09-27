<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractRequest extends FormRequest
{
    public function validationData(): array
    {
        $input = $this->all();
        $this->getInputSource()->replace($input);
        $this->request->replace($input);
        return parent::validationData();
    }
}
