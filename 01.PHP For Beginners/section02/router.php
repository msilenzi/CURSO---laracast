<?php

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php'
];

$current_route = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($current_route, $routes)) {
  require $routes[$current_route];
} else {
  http_response_code(404);
  require 'views/404.php';
  die();
}
