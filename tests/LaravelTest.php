<?php

namespace Mahi\Thumbnail\Tests;

use Illuminate\Support\Facades\Artisan;
use Mahi\Thumbnail\Console\ThumbnailCmd;
use Mahi\Thumbnail\Facades\Thumbnail;
use Mahi\Thumbnail\ThumbnailServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * @internal
 * @coversNothing
 */
class LaravelTest extends TestCase
{
    /** @test */
    public function testFacade()
    {
        $this->assertMatchesRegularExpression('#/thumb/#', Thumbnail::get('lorem'));
    }

    public function theRouteCanBeAcccessed()
    {
        $this
            ->get('/thumb/default/123456.jpg')
            ->assertStatus(404)
        ;
        $this
            ->get('/thumb/123456.jpg')
            ->assertStatus(404)
        ;
    }

    /** @test */
    public function theConsoleCommandReturnsAJoke()
    {
        $this->withoutMockingConsoleOutput();

        Thumbnail::shouldReceive('dummy')
            ->once()
            ->andReturn('dummy')
        ;

        $this->artisan('dummy');

        $output = Artisan::output();

        $this->assertSame('dummy'.PHP_EOL, $output);
    }

    protected function getPackageProviders($app)
    {
        return [ThumbnailServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Thumbnail' => ThumbnailCmd::class,
        ];
    }
}
