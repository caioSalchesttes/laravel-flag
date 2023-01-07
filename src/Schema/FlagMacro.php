<?php

namespace App\LaravelFlag\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Traits\Macroable;

class FlagMacro extends ServiceProvider
{
    use Macroable;

    public function register()
    {
        Blueprint::macro('flag', function () {
            $this->json('flag')->nullable();
        });
    }
}