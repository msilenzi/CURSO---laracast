<?php

namespace http\forms;

use core\Validator;

class LoginForm {
  private $errors = [];

  public function validate(string $email, string $password) {
    if (!Validator::email($email)) {
      $errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($password, 7, 255)) {
      $errors['password'] = 'Please provide a password of at least 7 characters';
    }

    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }
}
