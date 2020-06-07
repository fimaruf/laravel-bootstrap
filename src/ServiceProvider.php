<?php

namespace Wovosoft\LaravelBootstrap;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-bootstrap.php';

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG_PATH => config_path('laravel-bootstrap.php'),
            ], 'config');
        }

        $this->loadViewsFrom(__DIR__ . "/../resources/views", 'laravel-bootstrap');
        $finder = new Finder();
        foreach ($finder->files()->in(__DIR__ . "/View/Components")->name('*.php') as $component) {
            $cc = $component->getFilenameWithoutExtension();
            Blade::component(Str::kebab($cc), "Wovosoft\\LaravelBootstrap\\View\Components\\$cc");
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-bootstrap'
        );

        $this->app->bind('laravel-bootstrap', function () {
            return new LaravelBootstrap();
        });
    }
}
