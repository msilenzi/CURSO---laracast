<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about/index.php');
$router->get('/contact', 'controllers/contact/index.php');


// Notes:

$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->get('/notes/create', 'controllers/notes/create.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->get('/note/edit', 'controllers/notes/edit.php');

$router->get('/register', 'controllers/registration/create.php');
$router->post('/register', 'controllers/registration/store.php');
