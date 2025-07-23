<?php

namespace core;

class Container {
  private $bindings = [];

  public function bind(string $key, callable $factoryFn): void {
    $this->bindings[$key] = $factoryFn;
  }

  public function resolve(string $key) {
    if (!array_key_exists($key, $this->bindings)) {
      throw new \Exception("No matching binding found for {$key}");
    }
    return call_user_func($this->bindings[$key]);
  }
}
