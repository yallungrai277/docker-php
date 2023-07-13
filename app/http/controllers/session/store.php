<?php

use core\Authenticator;
use core\Session;
use http\forms\LoginForm;

$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$form = new LoginForm();

if ($form->validate($data)) {
    if ((new Authenticator)->attempt($data['email'], $data['password'])) {
        redirect('/');
    }
    $form->setErrors('email', 'No matching account for the provided email address and password.');
}

Session::flash('errors', $form->getErrors());
return redirect('/login');
