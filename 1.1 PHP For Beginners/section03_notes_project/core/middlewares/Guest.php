<?php

namespace core\middlewares;

use core\Session;

class Guest {
  public function handle() {
    if (Session::has('user')) redirect();
  }
}
