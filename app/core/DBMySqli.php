<?php

class DBMysqli{

    public static function getConnection(){
        $dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'smartist';
$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
return $connection;
    }

}



?>