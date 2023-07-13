<?php

namespace http\forms;

abstract class BaseForm
{
    protected $errors = [];

    abstract public function validate(array $attributes): bool;

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }
}
