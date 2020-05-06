<?php

namespace Mahi\Thumbnail\Tests;

use Orchestra\Testbench\TestCase;
use Mahi\Thumbnail\ThumbnailServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ThumbnailServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
