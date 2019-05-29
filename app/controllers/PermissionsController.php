<?php

class PermissionsController extends Controller{

public function index($param=''){
    $permissions = Permission::getGiven($_SESSION[ACCOUNT_IDENTIFIER]);

    self::view('Permissions/index','Permissions',[compact('permissions')]);
}
    public function grant(Type $var = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
           if(isset($_POST['user']) && isset($_POST['product'])){
            $product = Product::getProduct($_POST['product']);
            $user = Account::getProfileByName($_POST['user']);
            // echo 1;
            if($user && $product){
                // echo 2;
                if($product->getOwner() == $_SESSION[ACCOUNT_IDENTIFIER]){
                    // echo 3;
                    Permission::grantPermission($user->getId(), $product->getId(),1);
                    header('Location:'. PUBLIC_URL .'/permissions');
                }
                else{
                    die('You do not own this product');
                }
            }

           }
         
               die('Invalid parameters');
           
           
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