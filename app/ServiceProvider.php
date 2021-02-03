<?php

namespace App;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom($this->app->resourcePath('layouts'), 'layouts');

        app('blade.compiler')->directive('svg', function ($expression) {
            return "<?php echo getSvg($expression) ?>";
        });
    }
}
