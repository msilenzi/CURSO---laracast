<?php

require __DIR__ . '/vendor/autoload.php';

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$filePath = 'foo/bar/test.txt';
$contents = 'Hello World!';

$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'sa-east-1',
    'credentials' => [
        'key' => $_ENV['S3_KEY'],
        'secret' => $_ENV['S3_SECRET'],
    ]
]);

try {
    echo "Uploading object...";
    $s3->putObject([
        'Bucket' => $_ENV['S3_BUCKET'],
        'Key' => $filePath,
        'Body' => $contents,
        'ACL' => 'public-read',
    ]);
    echo "Done";
} catch (S3Exception $e) {
    echo "[" . $e->getCode() . "] " . $e->getMessage();
}