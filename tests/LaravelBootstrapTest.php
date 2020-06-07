<?php

namespace Wovosoft\LaravelBootstrap\Tests;

use Wovosoft\LaravelBootstrap\Facades\LaravelBootstrap;
use Wovosoft\LaravelBootstrap\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelBootstrapTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'laravel-bootstrap' => LaravelBootstrap::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
