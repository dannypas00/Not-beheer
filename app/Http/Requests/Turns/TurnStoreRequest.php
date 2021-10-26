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
            'throw1' => 'required|string|regex:/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|
            (^[TtDd][2][^1-9aA-zZ]$)|(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)/',
            'throw2' => 'required|string|regex:/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|
            (^[TtDd][2][^1-9aA-zZ]$)|(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)/',
            'throw3' => 'required|string|regex:/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|
            (^[TtDd][2][^1-9aA-zZ]$)|(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)/'
        ];
    }
}
