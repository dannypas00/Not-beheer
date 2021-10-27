<?php

namespace App\Services;

class ThrowToScoreService
{
    private static string $pattern = '/(D|T|BE|B|M)?(\d+)?/';

    /**
     * @param string $throw
     * @return int
     */
    public function convertThrow(string $throw): int
    {
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
