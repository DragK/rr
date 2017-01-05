<?php

$route->addRoute('', function() {
    echo 'Strona główna';
});

$route->addRoute('siema', function() {
    echo 'Witam';
});

$route->addRoute('contact', function () {
    new \RR\Controllers\Contact();
});

