<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about/index.php');
$router->get('/contact', 'controllers/contact/index.php');


// Notes:

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->get('/note/edit', 'controllers/notes/edit.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');
