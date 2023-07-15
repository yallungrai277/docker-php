<?php

use core\Authenticator;
use http\forms\auth\LoginForm;

$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


$form = LoginForm::validate($attributes);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form->setErrors('email', 'No matching account for the provided email address and password.')
        ->throw();
}

redirect('/');
