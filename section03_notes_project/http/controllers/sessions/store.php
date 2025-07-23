<?php

use core\App;
use core\Authenticator;
use core\Database;
use core\LoginAttemptResult;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return req_view('sessions/create.view.php', ['errors' => $form->getErrors()]);
}

$db = App::resolve(Database::class);

$auth = new Authenticator();

switch ($auth->attempt($email, $password)) {
  case LoginAttemptResult::WrongEmail:
    return req_view('sessions/create.view.php', ['errors' => [
        'email' => 'No account found for this email address'
      ]]);

  case LoginAttemptResult::WrongPassword:
    return req_view('sessions/create.view.php', ['errors' => [
        'password' => 'Wrong password'
      ]]);

  case LoginAttemptResult::Success:
    $auth->login(['email' => $email]);
    redirect();

  default:
    throw new \Error("Invalid LoginAttemptResult value");
}
