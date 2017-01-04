<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config/config.php';

$route = new \RR\Route\Route();

$path = path();

require_once __DIR__.'/app/config/routes.php';

if ($route->isRoute($path)) {
    $route->route[$path]();
} else {
    echo 'Error 404';
}