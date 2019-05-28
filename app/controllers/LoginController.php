<?php
    require_once '../app/core/DBMySqli.php';

class LoginController extends Controller{


public function index(){
	self::view('Login/index');
}



public function do(){

if (isset($_POST['signup'])){
    header('Location: ' . PUBLIC_URL .'/signup');
    exit();
}else{
    
    if (isset($_POST['login'])){
        $connection = DBMySqli::getConnection();
        $user = mysqli_real_escape_string($connection, $_POST['name_email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        if (empty($user) || empty($password)){
            header('Location:' . PUBLIC_URL ."/login/?fields=empty");
            exit();

        }
        
        if (strpos($user, '@') === false){
            echo 'you entered username';
            $sql= "SELECT * FROM account WHERE name='$user'";
        }else{
            echo 'you entered email';
            $sql = "SELECT
             .
             * FROM account WHERE email='$user'";
        }
        $result = mysqli_query($connection, $sql);
        $check = mysqli_num_rows($result);
        if ($check < 1) {
            header('Location:' . PUBLIC_URL ."/login/?login=error");
            exit();
        } else{
            if ($row = mysqli_fetch_assoc($result)){
                $password_check = password_verify($password, $row['password_hash']);
                if ($password_check == false){
                    header("Location: ". PUBLIC_URL. "/LogIn/?login=error");
                    exit();
                }elseif ($password_check == true){
                    $_SESSION[ACCOUNT_IDENTIFIER] = $row['id'];
                    header('Location:' . PUBLIC_URL ."/feed");
                    echo '<br>login success!<br><strong>Your details</strong><br>Name:'.$row['name'].'<br>Email:'.$row['email'];
                }

            }
        } 
    }
    else{
        echo 'click the login button!';
    }
}
}


}