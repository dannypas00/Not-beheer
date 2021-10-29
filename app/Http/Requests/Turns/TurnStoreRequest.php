<?php

namespace App\Http\Requests\Turns;

use App\Http\Requests\AbstractRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property string $throw1
 * @property string $throw2
 * @property string $throw3
 * @property int $setId
 * @property int $leg
 * @property int $fixtureId
 * @property int $player
 */
class TurnStoreRequest extends AbstractRequest
{
    /**
     * @return array<string>
     */

    public function rules(): array
    {
        $regexPart1 = 'regex:/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|(^[TtDd][2][^1-9aA-zZ]$)|';
        $regexPart2 = '(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)|(^[0]$)|(^[Mm]$)/';

        return [
            'throw1' => ['required',$regexPart1 . $regexPart2],
            'throw2' => ['required',$regexPart1 . $regexPart2],
            'throw3' => ['required',$regexPart1 . $regexPart2],
            'setId' => 'sometimes|required|int|nullable',
            'leg' => 'nullable|int',
            'fixtureId' => 'required|int',
            'player' => 'required|int',
        ];
    }
}
