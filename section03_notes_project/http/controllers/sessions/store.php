<?php

use core\App;
use core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return req_view('sessions/create.view.php', ['errors' => $form->getErrors()]);
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
