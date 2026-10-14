<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    require __DIR__.'/../vendor/autoload.php';
    echo 'COMPOSER AUTOLOAD WORKS';
} catch (\Throwable $e) {
    echo 'BOOTSTRAP ERROR: ' . $e->getMessage();
    exit;
}

exit;

