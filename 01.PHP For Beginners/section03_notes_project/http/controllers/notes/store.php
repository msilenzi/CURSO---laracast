<?php

use core\Validator;

$db = core\App::resolve(\core\Database::class);
$errors = [];

if (!Validator::string($_POST['title'], 1, 255)) {
  $errors['title'] = 'A title with no more than 255 characters is required';
}

if (!Validator::string($_POST['body'], 1, 1_000)) {
  $errors['body'] = 'A body with no more than 1.000 characters is required';
}

if (!empty($errors)) {
  req_view('notes/create.view.php', [
    'heading' => 'Create a Note',
    'errors' => $errors,
  ]);
  die();
}

$db->query('INSERT INTO notes (title, body, user_id) VALUES (?, ?, ?)', [
  $_POST['title'],
  $_POST['body'],
  1
]);
redirect('/notes');
