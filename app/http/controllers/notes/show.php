<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$note = $db->query('select * from notes where id = ?', [$_GET['id'] ?? 0])->findOrFail();

authorize($note['user_id'] === authUser()['id']);

view('views/notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);
