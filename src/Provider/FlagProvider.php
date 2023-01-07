<?php

namespace Cos\LaravelFlag\Provider;

use Illuminate\Support\ServiceProvider;

class FlagProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('db')->getSchemaBuilder()->macro('flag', function ($table, $column = 'flag') {
            $table->json($column)->nullable();
        });
    }
}