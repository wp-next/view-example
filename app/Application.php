<?php

namespace App;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use WpNext\View\ViewServiceProvider;

class Application extends Container
{
    protected $basePath;

    public function __construct(string $basePath)
    {
        $this->setBasePath($basePath);

        $this->bindPathsInContainer();
        $this->registerBaseBindings();
        $this->registerViewServiceProvider();

        $serviceProvider = new ServiceProvider($this);
        $serviceProvider->boot();
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');
    }

    protected function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);
        $this->instance(Container::class, $this);
        $this->bind('files', fn () => new Filesystem);
        $this->bind('events', fn () => new Dispatcher($this));

        $this->bind('config', function () {
            $config = new Repository();

            $config->set('view', [
                'paths' => [
                    $this->get('path.resources'),
                ],

                'compiled' => $this->get('path.storage').'/compiled',
            ]);

            return $config;
        });
    }

    protected function registerViewServiceProvider()
    {
        $this->alias('view', \Illuminate\View\Factory::class);
        $this->alias('view', \Illuminate\Contracts\View\Factory::class);

        $viewServiceProvider = new ViewServiceProvider($this);
        $viewServiceProvider->register();

        $this->bind('Illuminate\Contracts\Foundation\Application', fn () => $this);
    }

    protected function bindPathsInContainer()
    {
        $this->instance('path', $this->path());
        $this->instance('path.base', $this->basePath());
        $this->instance('path.resources', $this->resourcePath());
        $this->instance('path.public', $this->publicPath());
        $this->instance('path.storage', $this->storagePath());
    }

    public function basePath($path = '') : string
    {
        return $this->basePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function resourcePath($path = '')
    {
        return $this->basePath('resources').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function publicPath($path = '')
    {
        return $this->basePath('public_html').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function storagePath($path = '')
    {
        return $this->basePath('storage').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function getNamespace(): string
    {
        return 'App\\';
    }
}
