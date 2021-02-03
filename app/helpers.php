<?php

use Illuminate\Container\Container;

function app($abstract = null, array $parameters = [])
{
    if (is_null($abstract)) {
        return Container::getInstance();
    }

    return Container::getInstance()->make($abstract, $parameters);
}

function view($view = null, $data = [], $mergeData = [])
{
    $factory = app('view');

    if (func_num_args() === 0) {
        return $factory;
    }

    echo $factory->make($view, $data, $mergeData);
}

function getSvg(string $name, $class = '')
{
    $svg = file_get_contents(app()->resourcePath('assets/images/'.$name.'.svg'));

    if (empty($class)) {
        return $svg;
    }

    $doc = new \DOMDocument;
    $doc->loadXML($svg);
    $svgs = $doc->getElementsByTagName('svg');

    foreach ($svgs as $svg) {
        $svg->setAttribute('class', $class);
    }

    return $doc->saveHTML();
}

function mix($path, $manifestDirectory = '')
{
    return app(App\Mix::class)(...func_get_args());
}
