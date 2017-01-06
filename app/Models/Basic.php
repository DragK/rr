<?php

namespace RR\Models;


use \RR\Libraries\RRLogger;

class Basic
{
    public $pdo;

    public function __construct()
    {
        try {
            include_once __DIR__.'../../config/db.php';
            $this->pdo = new \PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8",$username,$passwd, $options);
        } catch (\PDOException $e) {
            echo $e->getMessage();

            $logger = new RRLogger();
            $logger->loggerError($e->getMessage());
        }
    }
}