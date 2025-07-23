<?php

$db = core\App::resolve(\core\Database::class);

$note = $db->query('select * from notes where note_id = :id', ['id' => $_GET['id']])
           ->findOneOrAbort();

$current_user_id = 1;
authorize($note['user_id'] === $current_user_id);

req_view('notes/edit.view.php', [
  'heading' => 'Edit a Note',
  'errors' => [],
  'note' => $note,
]);
