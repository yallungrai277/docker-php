<?php

namespace http\forms\auth;

use core\App;
use core\Database;
use core\Validator;

class RegisterForm extends LoginForm
{
    /**
     * {@inheritDoc}
     */
    protected function performValidation(array $attributes): void
    {
        parent::performValidation($attributes);

        $accountExists = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $attributes['email']
        ])->find();

        if ($accountExists) {
            $this->errors['email'] = 'The provided email address is already registered.';
        }

        if (!Validator::string($attributes['password'], 1, 16)) {
            $this->errors['password'] = 'Password must be between 1 to 16 characters.';
        }
    }
}
