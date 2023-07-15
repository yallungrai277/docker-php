<?php

namespace core;

use core\middleware\Middleware;
use core\SuperGlobal;

class Router
{
    const CONTROLLER_PATH = 'http/controllers/';

    protected array $routes = [];

    public function get(string $uri, string $controller): self
    {
        return $this->add($uri, $controller, SuperGlobal::METHOD_GET);
    }

    public function post(string $uri, string $controller): self
    {
        return $this->add($uri, $controller, SuperGlobal::METHOD_POST);
    }

    public function put(string $uri, string $controller): self
    {
        return $this->add($uri, $controller, SuperGlobal::METHOD_PUT);
    }

    public function patch(string $uri, string $controller): self
    {
        return $this->add($uri, $controller, SuperGlobal::METHOD_PATCH);
    }

    public function delete(string $uri, string $controller): self
    {
        return $this->add($uri, $controller, SuperGlobal::METHOD_DELETE);
    }

    public function only(string $key): self
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function previousUrl(): string
    {
        return $_SERVER[SuperGlobal::HTTP_REFERER];
    }

    protected function add(string $uri, string $controller, string $method): self
    {
        // compact takes a string of name within the scope and
        // converts it into array with corresponding key value pair.
        // opposite of extract.
        $middleware = null;
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');
        return $this;
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($route['method']) === strtoupper($method)) {
                // Apply the middleware.
                $this->applyMiddleware($route);

                require base_path(self::CONTROLLER_PATH . $route['controller']);
                return;
            }
        }
        abort();
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    private function applyMiddleware(array $route): void
    {
        if (!$route['middleware']) {
            return;
        }
        Middleware::resolve($route['middleware']);
    }
}
