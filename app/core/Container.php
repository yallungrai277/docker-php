<?php

namespace core;

use Exception;

class Container
{
    protected array $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key, array $args = [])
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found not {$key} from the container");
        }

        // This is also valid. Where args are unpacked dynamically.
        // return $this->bindings[$key](...$args);

        return call_user_func_array($this->bindings[$key], $args);
    }
}
