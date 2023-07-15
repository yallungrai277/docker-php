<?php

use core\App;
use core\Router;
use core\Container;
use core\Database;
use core\Session;
use core\SuperGlobal;
use core\exception\ValidationException;

$container = new Container;

$container->bind(Database::class, function (array $config = []) {
    if (empty($config)) {
        $config = require base_path('config/app.php');
        $config = $config['database'];
    }

    return new Database($config);
});

App::setContainer($container);

// Bootstrap routes.
$router = new Router;
// Require routes.
require base_path('router/routes.php');
$uriPath = parse_url($_SERVER[SuperGlobal::REQUEST_URI])['path'];
$method = $_SERVER[SuperGlobal::REQUEST_METHOD] == SuperGlobal::METHOD_POST && isset($_POST['_method']) ? $_POST['_method'] : $_SERVER[SuperGlobal::REQUEST_METHOD];

try {
    $router->route($uriPath, $method);
} catch (ValidationException $e) {
    Session::flash(SuperGlobal::OLD_FORM_DATA_KEY, $e->old);
    Session::flash(SuperGlobal::VALIDATION_ERROR_DATA_KEY, $e->errors);

    return redirect($router->previousUrl());
}

Session::unflash();
