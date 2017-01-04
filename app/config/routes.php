<?php

$route->addRoute('siema', function() {
    echo 'Witam';
});

$route->addRoute("siema/user", function($a) {
    echo 'Witaj '.$a;
});