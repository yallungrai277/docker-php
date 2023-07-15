<?php

namespace http\forms;

use core\exception\ValidationException;

abstract class BaseForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        $this->performValidation($attributes);
    }

    abstract protected function performValidation(array $attributes): void;

    public function failed(): bool
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors(string $field, string $message): self
    {
        $this->errors[$field] = $message;
        return $this;
    }

    public static function validate(array $attributes): self
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(): void
    {
        throw ValidationException::throw($this->errors, $this->attributes);
    }
}
