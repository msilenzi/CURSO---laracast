<?php

namespace core\middlewares;

class Auth {
  public function handle() {
    if (!isset($_SESSION['user'])) {
      header('location: /');
      exit();
    }
  }
}
