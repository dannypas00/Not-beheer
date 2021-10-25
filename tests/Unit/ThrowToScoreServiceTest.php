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
            "B"       => 50,
            "BE"      => 100,
            "B98"     => 50,
            "M100000" => 0
        ]);
        $testdata->each(function ($value, $throw) use ($service) {
            $this->assertSame($value, $service->convertThrow($throw));
        });
    }
}
