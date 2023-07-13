<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'] ?? 0
])->findOrFail();

authorize($currentUserId === $note['user_id']);

view('views/notes/edit.view.php', [
    'note' => $note,
    'heading' => 'Edit',
    'errors' => []
]);
