<?php

namespace Tests\Unit;

use App\Services\ThrowToScoreService;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;

class ThrowToScoreServiceTest extends TestCase
{
    public function testConvertThrow()
    {
        $service = new ThrowToScoreService();
        $testdata = collect([
            "T20"     => 60,
            "D3"      => 6,
            "5"       => 5,
            "M"       => 0,
            "B"       => 25,
            "BE"      => 50,
            "B98"     => 25,
            "M100000" => 0
        ]);
        $testdata->each(function ($value, $throw) use ($service) {
            $this->assertSame($value, $service->convertThrow($throw));
        });
    }
}
