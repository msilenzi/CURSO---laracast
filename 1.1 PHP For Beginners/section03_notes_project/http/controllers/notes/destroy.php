<?php

$db = core\App::resolve(\core\Database::class);

$note = $db->query('select * from notes where note_id = :id', ['id' => $_POST['id']])
           ->findOneOrAbort();

$current_user_id = 1;
authorize($note['user_id'] === $current_user_id);

$db->query('delete from notes where note_id = :id', ['id' => $_POST['id']]);
redirect('/notes');
