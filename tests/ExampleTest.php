<?php

namespace MahiMahi\LaravelThumbnails\Tests;

use Orchestra\Testbench\TestCase;
use MahiMahi\LaravelThumbnails\LaravelThumbnailsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelThumbnailsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
