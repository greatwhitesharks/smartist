<?php

require_once '../app/init.php';

session_start();

// $_SESSION['account_id']="@0002"; 

 //$_SESSION['accountId'] = 0;
$app = App::getInstance();
$app->respond();


