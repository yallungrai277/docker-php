<?php

use core\Response;

function dd(mixed $value, bool $die = true): void
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';

    if ($die) {
        die();
    }
}

function uriPathIs(string $value): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);
    require base_path("views/errors/{$code}.view.php");
    exit();
}

function authorize(bool $condition, int $code = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($code);
    }
}

function getDateTime(string $timezone = DEFAULT_TIMEZONE, string $format = 'Y-m-d H:i:s'): string
{
    $date = new DateTime('now', new DateTimeZone($timezone));
    return $date->format($format);
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function formatDateString(string $dateString, string $format = 'M d Y h:i a', string $fromFormat = 'Y-m-d H:i:s', $timezone = DEFAULT_TIMEZONE): string
{
    return DateTime::createFromFormat($fromFormat, $dateString, new DateTimeZone($timezone))->format($format);
}

function view(string $viewPath, array $data = []): void
{
    // Extracts the data passed inside of an array as variables.
    // For instance if we have ['heading' => 'Home'] in $data.
    // Then extract will extract array and create a variable named $heading with corresponding 
    // value and any other thing passed over on that array with key as
    // variable name and value as value. Basically extract will make a variable
    // within the current scope.
    extract($data);
    require base_path($viewPath);
}

function authUser(): array|null
{
    return $_SESSION['user'] ?? null;
}

function redirect(string $path): void
{
    header('location: ' . $path);
    exit;
}
