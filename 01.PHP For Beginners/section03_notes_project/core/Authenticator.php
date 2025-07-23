<?php

namespace core;

enum LoginAttemptResult {
  case WrongEmail;
  case WrongPassword;
  case Success;
}

class Authenticator {
  public function attempt(string $email, string $password): LoginAttemptResult {
    $db = App::resolve(Database::class);
    $user = $db->query("SELECT * FROM users WHERE email = :email", [
      "email" => $email
    ])->findOne();

    if (!$user) {
      return LoginAttemptResult::WrongEmail;
    }
    
    if (!password_verify($password, $user['password'])) {
      return LoginAttemptResult::WrongPassword;
    }

    return LoginAttemptResult::Success;
  }

  public function login($user) {
    Session::put('user', ['email' => $user['email']]);
    session_regenerate_id(true);
  }

  public function logout() {
    Session::destroy();
  }
}
