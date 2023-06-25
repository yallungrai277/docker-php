<?php

$routes = [
    '/' => '../controllers/index.php',
    '/notes' => '../controllers/notes.php'
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


function routeToController(string $uri, array $routes = []): void
{
    if (array_key_exists($uri, $routes)) {
        require($routes[$uri]);
    } else {
        abort();
    }
}

routeToController($uri, $routes);
