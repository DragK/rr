<?php

/*
 * Use REGEX for more advanced routes
 * Pattern: $route->addRoute('name', 'name-something', function ($var) {});
 * example: $route->addRoute('user/id', 'user/id-[0-9]', function ($id) {});
 */

$route->addRoute('', function() {
    echo 'Strona główna';
});

$route->addRoute('/contact/', function () {
    new \RR\Controllers\Contact();
});

$route->addRoute('/user_id\/[0-9]/', function ($args) {
    echo 'Strona uzytkownika o ID: '.$args['user_id'];
});

$route->addRoute('/name_id\/[0-9]+\/price\/[0-9]/', function ($args) {
    echo 'Strona produktu o id: '.$args['name_id'].'<br />';
    echo 'oraz cenie: '.$args['price'];
});
