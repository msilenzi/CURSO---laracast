<?php

$db = core\App::resolve(\core\Database::class);

req_view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $db->query('select * from notes where user_id = 1')->findAll(),
]);
