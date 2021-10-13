<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = include __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        Artisan::call('migrate:fresh --seed');
//        File::copy(config('database.connections.sqlite.url'), 'testdb_backup.sqlite');

        return $app;
    }
}
