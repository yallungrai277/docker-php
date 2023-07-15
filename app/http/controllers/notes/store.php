<?php

use core\App;
use core\Database;
use core\Session;
use http\forms\notes\NotesForm;

$db = App::resolve(Database::class);

$attributes = [
    'title' => $_POST['title'],
    'body' => $_POST['body']
];

NotesForm::validate($attributes);

$db->query('INSERT INTO notes (title, body, user_id, created_at, updated_at) values (:title, :body, :user_id, :created_at, :updated_at)', [
    'title' => strip_tags($attributes['title']),
    'body' => strip_tags($attributes['body']),
    'user_id' => authUser()['id'],
    'created_at' => getDateTime(),
    'updated_at' => getDateTime()
]);

Session::flash('success', 'Note has been created.');
redirect('/notes');
