<?php

function dd($value): void
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';

    die();
}

function uriPathIs($value): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = 404): void
{
    http_response_code($code);
    require "../views/errors/{$code}.view.php";
    die();
}
