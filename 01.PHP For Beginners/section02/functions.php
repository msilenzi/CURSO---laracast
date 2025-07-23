<?php 

function dd($value): never {  // Dump & Die
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function isCurrentPath(string $path): bool {
  return parse_url($_SERVER['REQUEST_URI'])['path'] === $path;
}
