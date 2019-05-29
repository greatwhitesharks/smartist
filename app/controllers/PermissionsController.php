<?php

class PermissionsController extends Controller{

public function index(){
    $permissions = Permission::getGiven($_SESSION[ACCOUNT_IDENTIFIER]);

    self::view('Permissions/index','Permissions',[compact('permissions')]);
}
    public function grant(Type $var = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
           $obj = self::getRequestObj();
           
        }
    }

    public function revoke(Type $var = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $input =file_get_contents('php://input');
            $obj = json_decode($input);
        }
    }

    
    
}