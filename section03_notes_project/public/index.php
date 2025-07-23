<?php

use core\Session;
use core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  req_base("{$class}.php");
});

req_data('bootstrap.php');

// Crear el router y cargar las rutas:
$router = new \core\Router();
$routes = req_data('routes.php', ["router" => $router]);

// Rutear (try) y manejar dinámicamente los errores de validación en los
// formularios (catch ValidationException):
try {
  $router->route(
    parse_url($_SERVER['REQUEST_URI'])['path'],
    $_POST['__req_method'] ?? $_SERVER['REQUEST_METHOD']
  );
} catch (ValidationException $e) {
  Session::flash('errors', $e->errors);
  Session::flash('old', $e->old);
  return redirect(prevUrl());
}

core\Session::flushFlash();
