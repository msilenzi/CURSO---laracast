<?php

namespace http\forms;

use core\ValidationException;
use core\Validator;

class LoginForm {
  private $errors = [];

  public function __construct(public array $attr) {
    if (!Validator::email($attr['email'])) {
      $this->errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($attr['password'], 7, 255)) {
      $this->errors['password'] = 'Please provide a password of at least 7 characters';
    }
  }

  public static function validate($attr) {
    $instance = new static($attr);
    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw() {
    ValidationException::throw($this->errors, $this->attr);
  }

  public function failed() {
    return count($this->getErrors()) > 0;
  }

  public function getErrors() {
    return $this->errors;
  }

  public function setError($field, $message) {
    $this->errors[$field] = $message;
    return $this;
  }
}
