<?php

use core\Authenticator;
use core\LoginAttemptResult;
use core\Session;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
  redirectWithErrors($form->getErrors());
}

$auth = new Authenticator();

switch ($auth->attempt($email, $password)) {
  case LoginAttemptResult::WrongEmail:
    redirectWithErrors(['email' => 'No account found for this email address']);

  case LoginAttemptResult::WrongPassword:
    redirectWithErrors(['password' => 'Wrong password']);

  case LoginAttemptResult::Success:
    $auth->login(['email' => $email]);
    redirect();

  default:
    throw new \Error("Invalid LoginAttemptResult value");
}

function redirectWithErrors($errors) {
  Session::flash('errors', $errors);
  Session::flash('old', ['email' => $_POST['email']]);
  redirect('/login');
}
