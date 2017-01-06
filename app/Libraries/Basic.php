<?php

namespace RR\Libraries;

use \Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;


abstract class Basic
{
    public function loadView($path, $data = null)
    {
        /*
         * Creates variables with the keys the array
         */
        if ($data != null) {
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $$key = $data[$key];
                }
            }
        }

        include_once __DIR__.'../../Views/'.$path;
    }
    public static function loggerError($content_message)
    {
        $logger = new Logger('RR');

        $logger->pushHandler(new StreamHandler(__DIR__.'../../../logs/RR_error.log', Logger::ERROR));
        $logger->pushHandler(new FirePHPHandler());
        $logger->addError($content_message);
    }
}