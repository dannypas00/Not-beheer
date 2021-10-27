<?php

namespace App\Services;

use App\Models\Turn;
use Illuminate\Support\Collection;

class ThrowToScoreService
{
    private static string $pattern = '/(D|T|BE|B|M)?(\d+)?/';

    /**
     * @param Turn $turn
     * @return Collection
     */
    public function convertTurn(Turn $turn): Collection
    {
        return new Collection([
            $this->convertThrow($turn->throw1),
            $this->convertThrow($turn->throw2),
            $this->convertThrow($turn->throw3)
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
            "D" => $number * 2,
            "T" => $number * 3,
            "B" => 25,
            "BE" => 50,
            "M" => 0,
            default => $number,
        };
    }
}
