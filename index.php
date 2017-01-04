<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/config/config.php';

echo SITE_URL;

$route = new \RR\Route\Route();

$path = path();

require_once 'app/config/routes.php';
$a = 'Marcin';
if ($route->isRoute($path)) {
    $route->route[$path]($a);
} else {
    echo 'Error 404';
}