<?php

class LogoutController extends Controller{


public function index(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION[ACCOUNT_IDENTIFIER] = '';
        session_destroy();

    }
    header('Location:' . PUBLIC_URL . '/login' );
}


public function test(){
    echo password_hash('1234',PASSWORD_DEFAULT );
}
}