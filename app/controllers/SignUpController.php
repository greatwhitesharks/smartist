<?php

require_once '../app/core/DBMySqli.php';


class SignUpController extends Controller{


public function index(){
	self::view('Login/signup');
}

public function group(){
    self::view('Login/group');
}
public function do(){

    
if (isset($_POST['signup'])){

   $connection = DBMySqli::getConnection();
    if($type = isset($_POST['type'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
       
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $reenter_password = mysqli_real_escape_string($connection, $_POST['reenter_password']);
   
        $occupation_input = $_POST['occupation'];
        // escaping array contents
        for($i = 0; $i < count($occupation_input); $i++){
            $occupation_input[$i] = mysqli_real_escape_string($connection, $occupation_input[$i]);
        }

        
    if (array_search('other',$occupation_input)){
        $occupation = mysqli_real_escape_string($connection, $_POST['other_occu']);
        array_pop($occupation_input);
        $occupation_input = array_merge($occupation_input, [$occupation]);
    }
        // joining the array with ,
        $occupation = implode(',', $occupation_input);
        $gender = '';
        $dob = '';

        if($_POST['type'] == 'individual'){
            $gender = mysqli_real_escape_string($connection, $_POST['gender']);
            $dob = mysqli_real_escape_string($connection, $_POST['dob']);

        }


    }
    
    
    // $occupation_input = mysqli_real_escape_string($connection, $occupation_input)


    // var_dump($occupation_input);
    

    // if (!empty($occupation_input)){
    //     foreach($_POST['occupation'] as $selcted_occu){
    //         echo $selcted_occu;
    //     }
    // }


    //error handling

    //checking for username availability
    $sql = "SELECT * FROM account WHERE name='$username'";
    $result = mysqli_query($connection, $sql);
    $check = mysqli_num_rows($result);
    if ($check > 0){
        echo 'username taken';
        //header("Location: ../SignUp.html?signup=username_taken");
        //exit();
    }
    else{
        //hashing the password
        echo 'username available<br>';
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        //check if password=reentry
        if (password_verify($reenter_password, $hashedpassword)!=1){
            echo 'pw error';
            //header("Location: ../SignUp.html?password_mismatch");
            //exit();
        }
        else{
            //insert user into database
            echo 'pw okay<br>';
            $type = ($type === 'individual') ? 'solo' : 'group'; 

            // Make an entry for the account in the followable table
            $sql = "INSERT INTO followables (type) values('account');";
            $result = mysqli_query($connection, $sql);
            $followableId = mysqli_insert_id($con);

            $sql = "INSERT INTO account (name, type, display_name, email, dob, gender, occupation, password_hash, followable_id) VALUES ('$username','$type' ,'$name', '$email', '$dob', '$gender', '$occupation', '$hashedpassword', '$followableId');";
            $result = mysqli_query($connection, $sql);
            $accountId = mysqli_insert_id($con);
            $_SESSION[ACCOUNT_IDENTIFIER] = $accountId;
            header("Location: " . PUBLIC_URL . "/artist/");
            //exit();
        }
    }
}
else{
    echo 'ded';
    //header("Location: ../SignUp.html");
    //exit();
}
}


}