<?php

    class DB
    {
        private static $con;
        private function __construct(){
            try {
                $dbServername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "user details";

                $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
            }catch (Exceptions e) {
                echo 'Error';
            }
        }public static function getConnection(){
            if (!self::$conn) {
                new DB();
            }
            return self::$conn;
        }
    }
