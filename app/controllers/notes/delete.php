<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$note = $db->query('select * from notes where id = ?', [$_POST['id'] ?? 0])->findOrFail();

$currentUserId = 2;
authorize($note['user_id'] === $currentUserId);
// Delete a note.
$query = $db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit;
