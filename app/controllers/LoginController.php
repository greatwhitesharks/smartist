<?php
    require_once '../app/core/DBMySqli.php';

class LoginController extends Controller{


public function index(){
	self::view('Login/index');
}



public function do(){

    if(isset($_SESSION[ACCOUNT_IDENTIFIER])){
        header('Location:' . PUBLIC_URL. '/artist');
    }

if (isset($_POST['signup'])){
    header('Location: ' . PUBLIC_URL .'/signup');
    exit();
}else{
    
    if (isset($_POST['login'])){

        $user = $_POST['username_email'];
        $password =  $_POST['password'];

        if (empty($user) || empty($password)){
            header('Location:' . PUBLIC_URL ."/login/?fields=empty");
            
            exit();

        }
        
        $account = null;
        if (strpos($user, '@') === false){
            $account = Account::getProfileByName($user);
        }else{
            $account = Account::getProfileByEmail($user);
        }

        if (!$account) {
            // Account doesnt exist
            header('Location:' . PUBLIC_URL ."/login/?login=error");
            exit();
        } else{
         
                $password_check = password_verify($password,$account->getHash());
                if ($password_check == false){
                    // Invalid password
                    header("Location: ". PUBLIC_URL. "/LogIn/?login=error");
                    exit();
                }elseif ($password_check == true){
                    $_SESSION[ACCOUNT_IDENTIFIER] = $account->getId();
                    header('Location:' . PUBLIC_URL ."/artist");
                    //echo '<br>login success!<br><strong>Your details</strong><br>Name:'.$row['name'].'<br>Email:'.$row['email'];
                }

            }
        } 
    
    else{
        echo 'click the login button!';
    }
}
}


}