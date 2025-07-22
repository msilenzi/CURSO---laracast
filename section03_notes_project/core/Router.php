<?php

namespace core;

class Router {
  private $routes = [];

  public function post(string $uri, string $controller_path) {
    $this->add('POST', $uri, $controller_path);
  }

  public function get(string $uri, string $controller_path) {
    $this->add('GET', $uri, $controller_path);
  }

  public function patch(string $uri, string $controller_path) {
    $this->add('PATCH', $uri, $controller_path);
  }

  public function put(string $uri, string $controller_path) {
    $this->add('PUT', $uri, $controller_path);
  }

  public function delete(string $uri, string $controller_path) {
    $this->add('DELETE', $uri, $controller_path);
  }

  public function route(string $uri, string $method) {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        return req_base($route['controller']);
      }
    }
    abort(HttpResponse::NOT_FOUND);
  }

  private function add(string $method, string $uri, string $controller_path) {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller_path,
      'method' => $method,
    ];
  }
}
