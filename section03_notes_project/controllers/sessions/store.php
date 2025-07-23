<?php

use core\Validator;
use core\App;
use core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
  return req_view('sessions/create.view.php', ['errors' => $errors]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  "email" => $email
])->findOne();


if (!$user) {
  return req_view('sessions/create.view.php', ['errors' => [
    'email' => 'No account found for this email address'
  ]]);
}

if (!password_verify($password, $user['password'])) {
  return req_view('sessions/create.view.php', ['errors' => [
    'password' => 'Wrong password'
  ]]);
}


login(['email' => $email]);

header('location: /');
exit();
