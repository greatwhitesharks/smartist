<?php

require_once '../app/init.php';

session_start();


$app = App::getInstance();
$app->respond();


