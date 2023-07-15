<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$notes = $db->query('select * from notes where user_id = ? order by updated_at desc', [authUser()['id']])->get();

view('views/notes/index.view.php', [
    'heading' => 'Notes',
    'notes' => $notes
]);
