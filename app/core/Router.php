<?php

namespace core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $controller): void
    {
        $this->add($uri, $controller, SuperGlobal::METHOD_GET);
    }

    public function post(string $uri, string $controller): void
    {
        $this->add($uri, $controller, SuperGlobal::METHOD_POST);
    }

    public function put(string $uri, string $controller): void
    {
        $this->add($uri, $controller, SuperGlobal::METHOD_PUT);
    }

    public function patch(string $uri, string $controller): void
    {
        $this->add($uri, $controller, SuperGlobal::METHOD_PATCH);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add($uri, $controller, SuperGlobal::METHOD_DELETE);
    }

    protected function add(string $uri, string $controller, string $method): void
    {
        // compact takes a string of name within the scope and
        // converts it into array with corresponding key value pair.
        // opposite of extract.
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($route['method']) === strtoupper($method)) {
                require base_path($route['controller']);
                return;
            }
        }
        abort();
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
