<?php

namespace http\forms\auth;

use core\Validator;
use http\forms\BaseForm;

class LoginForm extends BaseForm
{
    /**
     * {@inheritDoc}
     */
    protected function performValidation(array $attributes): void
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'The provided email is not a valid email address.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please enter a valid password.';
        }
    }
}
