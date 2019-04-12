<?php


require_once 'core/App.php';
require_once 'core/Config.php';
require_once 'core/DB.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'models/Follow/FollowService.php';
require_once 'models/Account/Account.php';
require_once 'models/Product/Product.php';


spl_autoload_register(
    function ($name) {
        $filePath = preg_replace(
            '/^([A-Z][a-z]+)([A-Z][a-z]+){0,1}$/',
            '../app/models/$1/$0.php',
            $name
        );

        if (file_exists($filePath)) {
            include $filePath;
        } else {
            die("Included class, {$name} doesn't exist");
        }
    }
);
