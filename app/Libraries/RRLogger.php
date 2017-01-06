<?php

namespace RR\Libraries;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;


class RRLogger
{
    public $logger = '';

    public function __construct()
    {
        $this->logger = new Logger('RR');
    }

    public function loggerError($content_message)
    {
        $this->logger->pushHandler(new StreamHandler(__DIR__.'../../../logs/RR_error.log', Logger::ERROR));
        $this->logger->pushHandler(new FirePHPHandler());
        $this->logger->addError($content_message);
    }
}