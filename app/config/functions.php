<?php

function path() {
    $path = trim($_SERVER["QUERY_STRING"], '/');
    $path = explode('?', $path)[0];
    $path = explode('&', $path)[0];
    $path = strtolower($path);

    return $path;
}