<?php

$rootDir = "storage";
$filePath = 'foo/bar/text.txt';
$contents = 'Hello World!';

$savePath = "{$rootDir}/{$filePath}";

mkdir(dirname($savePath), 0777, true);
file_put_contents($savePath, $contents);
