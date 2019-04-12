<?php

class DB
{
    private static $con;

    private function __construct()
    {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $options = [];
            self::$con = new PDO($dsn, DB_USER, DB_PASS, $options);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error';
        }
    }


    public static function getConnection()
    {
        if (!self::$con) {
            new DB();
        }
        return self::$con;
    }
}
