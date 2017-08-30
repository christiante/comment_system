<?php

require_once "Config.php";

class Db extends \PDO
{
    public function __construct()
    {
        $driverOptions[\PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES UTF8';
        parent::__construct('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';', Config::DB_USR, Config::DB_PWD, $driverOptions);
        $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}