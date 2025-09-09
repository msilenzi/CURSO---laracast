<?php

$router->get('/', 'index.php');
$router->get('/about', 'about/index.php');
$router->get('/contact', 'contact/index.php');


// Notes:
$router->get('/notes', 'notes/index.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');

// Note:
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');


// Auth:
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/sessions', 'sessions/store.php')->only('guest');
$router->delete('/sessions', 'sessions/destroy.php')->only('auth');
