<?php

namespace App;

class LocalStorage implements FileStorage {
    public function put(string $path, string $content): void {
        $rootDir = __DIR__ . "/../storage";
        $savePath = "{$rootDir}/{$path}";
        $saveDir = dirname($savePath);

        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0777, true);
        }
        file_put_contents($savePath, $content);
    }
}
