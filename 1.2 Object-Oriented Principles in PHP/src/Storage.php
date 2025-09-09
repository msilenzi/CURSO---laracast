<?php

namespace App;

use Aws\S3\S3Client;

class Storage {
    /**
     * @throws \InvalidArgumentException
     */
    public static function resolve(): S3Storage|LocalStorage {
        switch ($_ENV['PREFERRED_FILE_STORAGE']) {
            case 's3':
                $s3Client = new S3Client([
                    'version' => 'latest',
                    'region' => 'sa-east-1',
                    'credentials' => [
                        'key' => $_ENV['S3_KEY'],
                        'secret' => $_ENV['S3_SECRET'],
                    ]
                ]);
                return new S3Storage($s3Client, $_ENV['S3_BUCKET']);
            case 'local':
                return new LocalStorage();
            default:
                throw new \InvalidArgumentException("Unsupported storage");
        }
    }

    protected function __construct() {}
}
