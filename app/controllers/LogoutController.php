<?php

class LogoutController extends Controller{


public function index($param=''){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION[ACCOUNT_IDENTIFIER] = '';
        session_destroy();

    }
    header('Location:' . PUBLIC_URL . '/login' );
}


}