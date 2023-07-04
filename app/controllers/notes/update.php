<?php

use core\App;
use core\Database;
use core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'] ?? 0
])->findOrFail();

authorize($currentUserId === $note['user_id']);

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'The title must be between 1 to 100 characters';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'The body must be between 1 to 255 characters.';
}

if (!empty($errors)) {
    return view('views/notes/edit.view.php', [
        'heading' => 'Edit',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set title = :title, body = :body, updated_at = :updated_at where id= :id', [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'updated_at' => getDateTime(),
    'id' => $note['id']
]);

header('location: /notes');
exit;
