<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param string $table
     * @return mixed
     */
    protected function getLastInsertedId(string $table)
    {
        return DB::table($table)
            ->select('id')
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first()
            ->id;
    }
}
