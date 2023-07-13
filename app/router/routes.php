<?php

$router->get('/', 'index.php');
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->get('/note/create', 'notes/create.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');

$router->delete('/note/delete', 'notes/delete.php')->only('auth');
$router->post('/note/store', 'notes/store.php')->only('auth');
$router->patch('/note/update', 'notes/update.php')->only('auth');

$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');
$router->delete('/logout', 'session/delete.php')->only('auth');
