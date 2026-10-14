<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    require __DIR__.'/../vendor/autoload.php';

    $app = require_once __DIR__.'/../bootstrap/app.php';

    echo 'LARAVEL BOOTSTRAP WORKS';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<pre>';
    echo get_class($e) . ': ' . $e->getMessage();
    echo "\n\n" . $e->getFile() . ':' . $e->getLine();
    echo '</pre>';
}

exit;
