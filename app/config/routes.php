<?php

/*
 * Use REGEX for more advanced routes. Only begin with the | string | number | special sign like _ or - (see example)
 * Beginning with pattern '/name_[0-9]/' is disallowed. Routing will not working.
 * Pattern: $route->addRoute('/name\/value/', function ($args) {});
 * example: $route->addRoute('/name_id\/[0-9]+/', function ($id) {});
 */

$route->addRoute('', function() {
    echo 'Strona główna';
});

$route->addRoute('404', function () {
    echo 'Nie ma takiej strony';
});

$route->addRoute('contact', function () {
    new \RR\Controllers\Contact();
});

$route->addRoute('/user_id\/[0-9]/', function ($args) {
    echo 'Strona uzytkownika o ID: '.$args['user_id'];
});

$route->addRoute('/name_id\/[0-9]+\/price\/[0-9]/', function ($args) {
    echo 'Strona produktu o id: '.$args['name_id'].'<br />';
    echo 'oraz cenie: '.$args['price'];
});
