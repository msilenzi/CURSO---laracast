<?php

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  req_base("{$class}.php");
});

req_data('bootstrap.php');

$router = new \core\Router();
$routes = req_data('routes.php', ["router" => $router]);
$current_route = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->route(
  $current_route,
  $_POST['__req_method'] ?? $_SERVER['REQUEST_METHOD']
);
