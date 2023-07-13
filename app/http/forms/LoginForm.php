<?php

namespace http\forms;

use core\Validator;

class LoginForm extends BaseForm
{
    public function validate(array $attributes): bool
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'The provided email is not a valid email address.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please enter a valid password.';
        }

        return empty($this->errors);
    }
}
