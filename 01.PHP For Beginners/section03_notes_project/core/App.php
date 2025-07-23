<?php

namespace core;

class App {
  private static ?Container $container = null;
  
  public static function setContainer(Container $container) {
    self::$container = $container;
  }

  public static function resolve(string $key) {
    return self::$container->resolve($key);
  }
}
