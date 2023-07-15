<?php

use core\Session;
use core\Authenticator;
use http\forms\auth\RegisterForm;

$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

RegisterForm::validate($attributes);

$authenticator = new Authenticator;
$user = $authenticator->register($attributes);
$authenticator->login($user);

Session::flash('success', 'Successfully registered and logged in.');
redirect('/');
