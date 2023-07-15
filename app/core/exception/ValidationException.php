<?php

namespace core\exception;

use Exception;

class ValidationException extends Exception
{
    /**
     * Readonly properties can be set once and then only be read in subsequent calls.
     * The validation errors.
     */
    public readonly array $errors;

    /**
     * Readonly properties can be set once and then only be read in subsequent calls.
     * The old form data.
     */
    public readonly array $old;

    public static function throw(array $errors, array $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}
