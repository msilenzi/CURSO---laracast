<?php

namespace core;

use core\middlewares\Middleware;

class Router
{
  private $routes = [];

  public function post(string $uri, string $controller_path)
  {
    return $this->add('POST', $uri, $controller_path);
  }

  public function get(string $uri, string $controller_path)
  {
    return $this->add('GET', $uri, $controller_path);
  }

  public function patch(string $uri, string $controller_path)
  {
    return $this->add('PATCH', $uri, $controller_path);
  }

  public function put(string $uri, string $controller_path)
  {
    return $this->add('PUT', $uri, $controller_path);
  }

  public function delete(string $uri, string $controller_path)
  {
    return $this->add('DELETE', $uri, $controller_path);
  }

  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }

  public function route(string $uri, string $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        Middleware::resolve($route['middleware']);
        return req_base($route['controller']);
      }
    }
    abort(HttpResponse::NOT_FOUND);
  }

  private function add(string $method, string $uri, string $controller_path)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller_path,
      'method' => $method,
      'middleware' => null,
    ];
    return $this;
  }
}
