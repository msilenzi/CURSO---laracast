<?php

use core\App, core\Container, core\Database;

$container = new Container();

$container->bind('core\Database', function () {
  $config = req_data('config.php');
  return new Database($config['db']);
});

App::setContainer($container);
