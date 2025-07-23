<?php

namespace core\middlewares;

use core\Session;

class Auth {
  public function handle() {
    if (!Session::has('user')) redirect();
  }
}
