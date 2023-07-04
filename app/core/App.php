<?php

namespace core;

use core\Container;

class App
{
    protected static $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function resolve(string $key): mixed
    {
        return static::$container->resolve($key);
    }
}