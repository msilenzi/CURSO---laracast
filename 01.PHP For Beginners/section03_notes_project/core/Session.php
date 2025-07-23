<?php

namespace core;

class Session {
  public static function put($key, $value) {
    $_SESSION[$key] = $value;
  }

  public static function flash($key, $value) {
    $_SESSION['__flash'][$key] = $value;
  }

  public static function get($key, $default = null) {
    return $_SESSION['__flash'][$key] ?? $_SESSION[$key] ?? $default;
  }

  public static function has($key) {
    return isset($_SESSION['__flash'][$key]) || isset($_SESSION[$key]);
  }

  public static function flushFlash() {
    unset($_SESSION['__flash']);
  }

  public static function flushSession() {
    $_SESSION = [];
  }

  public static function destroy() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }

    self::flushSession();
    session_destroy();

    $params = session_get_cookie_params();
    setcookie(
      session_name(), // equivalente a 'PHPSESSID'
      '',
      time() - 42000,
      $params['path'],
      $params['domain'],
      $params['secure'],
      $params['httponly']
    );
  }
}
