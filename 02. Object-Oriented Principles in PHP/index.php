<?php

require 'vendor/autoload.php';

use App\Storage;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$storage = Storage::resolve();
$storage->put("file.txt","Content");
