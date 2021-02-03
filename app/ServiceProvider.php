<?php

namespace App;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom($this->app->resourcePath('layouts'), 'layouts');
    }
}
