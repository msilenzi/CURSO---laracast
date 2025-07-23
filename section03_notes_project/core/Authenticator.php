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
    $_SESSION['user'] = [
      'email' => $user['email']
    ];
    session_regenerate_id(true);
  }

  public function logout() {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie(
      'PHPSESSID',
      '',
      time() - 42000,
      $params['path'],
      $params['domain'],
      $params['secure'],
      $params['httponly']
    );
  }
}
