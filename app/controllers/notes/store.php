<?php

use core\App;
use core\Database;
use core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'The title must be between 1 to 100 characters';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'The body must be between 1 to 255 characters.';
}

if (!empty($errors)) {
    return view('views/notes/create.view.php', [
        'heading' => 'Create a note',
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO notes (title, body, user_id, created_at, updated_at) values (:title, :body, :user_id, :created_at, :updated_at)', [
    'title' => strip_tags($_POST['title']),
    'body' => strip_tags($_POST['body']),
    'user_id' => 2,
    'created_at' => getDateTime(),
    'updated_at' => getDateTime()
]);

header('location: /notes');
