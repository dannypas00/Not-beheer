<?php

namespace App\Services;

use App\Models\Turn;
use Illuminate\Support\Collection;

class ThrowToScoreService
{
    private static string $pattern = '/(D|d|T|t|BE|be|B|b|m|M)?(\d+)?/';

    /**
     * @param Turn $turn
     * @return Collection
     */
    public function convertTurn(Turn $turn): Collection
    {
        return new Collection([
            $this->convertThrow($turn->throw_1),
            $this->convertThrow($turn->throw_2),
            $this->convertThrow($turn->throw_3)
        ]);
    }

    /**
     * @param ?string $throw
     * @return int
     */
    public function convertThrow(?string $throw): int
    {
        if (is_null($throw)) {
            return 0;
        }
        preg_match_all(self::$pattern, $throw, $matches);
        $type = $matches[1][0];
        $number = filled($matches[2][0]) ? $matches[2][0] : 0;
        return $this->letterAndNumberToScore($type, $number);
    }

    /**
     * @param string $type
     * @param int $number
     * @return int
     */
    public function letterAndNumberToScore(string $type, int $number): int
    {
        return match ($type) {
            "D", "d" => $number * 2,
            "T", "t" => $number * 3,
            "B", "b" => 25,
            "BE", "be" => 50,
            "M", "m" => 0,
            default => $number,
        };
    }
}
