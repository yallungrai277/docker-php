<?php

use core\App;
use core\Database;
use core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

function redirectBack(array $errors)
{
    return view('views/register/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'The provided email is not a valid email address';
}

if (!Validator::string($password, 1, 16)) {
    $errors['password'] = 'The password must be between 1 to 16 characters.';
}

if (!empty($errors)) {
    return redirectBack($errors);
}

// Check account exists.
$record = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($record) {
    $errors['email'] = 'The provided email address is already in use.';
    return redirectBack($errors);
}

$db->query('insert into users(email, password, created_at, updated_at) values (:email, :password, :created_at, :updated_at)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'created_at' => getDateTime(),
    'updated_at' => getDateTime()
]);

login([
    'email' => $email
]);

header('location: /');
exit;