<?php

$router->get('/', 'controllers/index.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/note/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');

$router->delete('/note/delete', 'controllers/notes/delete.php');
$router->post('/note/store', 'controllers/notes/store.php');
$router->patch('/note/update', 'controllers/notes/update.php');
