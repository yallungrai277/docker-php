<?php

session_start();
define('DEFAULT_TIMEZONE', 'Australia/Melbourne');
define('BASE_PATH', __DIR__ . '/../');
define('PUBLIC_PATH', __DIR__ . '/');

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'helpers/functions.php';

// Load the class name as a string that you want to call.
// This is autoloaded from composer so we dont need it. Keeping it here for reference.
// spl_autoload_register(function (string $class) {
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });
require base_path('bootstrap.php');
