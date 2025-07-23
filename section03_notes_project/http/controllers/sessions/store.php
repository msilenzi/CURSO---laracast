<?php

use core\Authenticator;
use core\LoginAttemptResult;
use http\forms\LoginForm;

$formData = [
  'email' => $_POST['email'],
  'password' => $_POST['password'],
];

$form = new LoginForm($formData);
$auth = new Authenticator();

switch ($auth->attempt($formData['email'], $formData['password'])) {
  case LoginAttemptResult::WrongEmail:
    $form->setError('email', 'No account found for this email')->throw();
    break;

  case LoginAttemptResult::WrongPassword:
    $form->setError('password', 'Wrong password')->throw();
    break;

  case LoginAttemptResult::Success:
    $auth->login(['email' => $formData['email']]);
    redirect();
    break;

  default:
    throw new \Error("Invalid LoginAttemptResult value");
    break;
}
