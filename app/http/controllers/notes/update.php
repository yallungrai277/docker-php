<?php

use core\App;
use core\Session;
use core\Database;
use http\forms\notes\NotesForm;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'] ?? 0
])->findOrFail();

authorize(authUser()['id'] === $note['user_id']);

$attributes = [
    'title' => $_POST['title'],
    'body' => $_POST['body']
];

NotesForm::validate($attributes);

$db->query('update notes set title = :title, body = :body, updated_at = :updated_at where id = :id', [
    'title' => strip_tags($attributes['title']),
    'body' => strip_tags($attributes['body']),
    'updated_at' => getDateTime(),
    'id' => $note['id']
]);

Session::flash('success', 'Note has been updated.');
redirect('/notes');
