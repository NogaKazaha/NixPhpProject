<?php

namespace Core;

use PDO;
use Core\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $database = null;
        if ($database === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $database = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $database;
    }
}
