<?php

namespace core\middleware;

use Exception;

abstract class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    abstract public function handle(): void;

    public static function resolve(string $key)
    {
        $middleware = static::MAP[$key] ?? null;
        if (!$middleware) {
            throw new Exception('No matching middleware found for ' . $key);
        }
        (new $middleware)->handle();
    }
}
