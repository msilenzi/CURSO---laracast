<?php 

// REQUIRES:

function req_base(string $path, $attr = []) {
  extract($attr);
  return require BASE_PATH . $path;
}

function req_core(string $path, $attr = []) {
  return req_base("core/{$path}", $attr);
}

function req_data(string $path, $attr = []) {
  return req_base("data/{$path}", $attr);
}

function req_view(string $path, $attr = []) {
  return req_base("views/{$path}", $attr);
}

//
// UTILS:

function abort(int $code = 404): never {
  http_response_code($code);
  req_view("errors/{$code}.view.php");
  die();
}

function authorize($cond, $status = core\HttpResponse::FORBIDDEN): void {
  if (!$cond) abort($status);
}

function dd($value): never {  // Dump & Die
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function isCurrentPath(string $path): bool {
  return parse_url($_SERVER['REQUEST_URI'])['path'] === $path;
}
