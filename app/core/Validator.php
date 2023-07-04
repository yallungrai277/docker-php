<?php

namespace core;

class Validator
{
    public static function string(string $value, $min = 1, $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): string
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
