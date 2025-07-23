<?php

use core\Validator;

$db = core\App::resolve(\core\Database::class);

// Get the note:
$note = $db->query('select * from notes where note_id = :id', ['id' => $_POST['id']])
           ->findOneOrAbort();

// Validate access:
$current_user_id = 1;
authorize($note['user_id'] === $current_user_id);


// Validate errors:
$errors = [];

if (!Validator::string($_POST['title'], 1, 255)) {
  $errors['title'] = 'A title with no more than 255 characters is required';
}

if (!Validator::string($_POST['body'], 1, 1_000)) {
  $errors['body'] = 'A body with no more than 1.000 characters is required';
}

if (!empty($errors)) {
  req_view('notes/edit.view.php', [
    'heading' => 'Edit a Note',
    'note' => [
      'id' => $_POST['id'],
      'title' => $_POST['title'],
      'body' => $_POST['body'],
    ],
    'errors' => $errors,
  ]);
  die();
}

$db->query('UPDATE notes SET title = ?, body = ? where note_id = ?', [
  $_POST['title'],
  $_POST['body'],
  $_POST['id'],
]);

redirect("/note?id={$_POST['id']}");
