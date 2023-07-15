<?php

use core\App;
use core\Session;
use core\Database;

$db = App::resolve(Database::class);
$note = $db->query('select * from notes where id = ?', [$_POST['id'] ?? 0])->findOrFail();

authorize($note['user_id'] === authUser()['id']);
// Delete a note.
$query = $db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

Session::flash('success', 'Note has been deleted.');
redirect('/notes');
