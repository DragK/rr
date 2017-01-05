<?php

namespace RR\Controllers;


class Basic
{
    public function loadView($path, $data = null)
    {
        /*
         * Creates variables with the keys the array
         */
        if ($data != null) {
            foreach ($data as $key => $value) {
                $$key = $data[$key];
            }
        }

        include_once __DIR__.'../../Views/'.$path;
    }
}