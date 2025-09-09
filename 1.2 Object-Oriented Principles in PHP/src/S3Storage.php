<?php

namespace App;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

class S3Storage implements FileStorage {
    public function __construct(
        protected S3Client $s3,
        protected string $bucket
    ) {}

    public function put(string $path, string $content): void {
        $this->s3->putObject([
            'Bucket' => $this->bucket,
            'Key' => $path,
            'Body' => $content,
        ]);
    }
}
