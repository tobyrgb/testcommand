<?php

namespace Z4net\PatternGenerator;

use Illuminate\Support\ServiceProvider;
use Z4net\PatternGenerator\Commands\MakePattern;
use Z4net\PatternGenerator\Commands\MakeRepository;
use Z4net\PatternGenerator\Commands\MakeService;

class PatternServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            MakeRepository::class,
            MakeService::class,
            MakePattern::class,
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.service.make', function ($app) {
            return new MakeService();
        });
        $this->commands(['command.service.make']);
    }
}
