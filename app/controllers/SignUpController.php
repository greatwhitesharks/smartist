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

    



    $type = $_POST['type'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
       
        $password = $_POST['password'];
        $reenter_password = $_POST['reenter_password'];
   
        $occupation_input = $_POST['occupation'];
        // escaping array contents
        for($i = 0; $i < count($occupation_input); $i++){
            $occupation_input[$i] = $occupation_input[$i];
        }

        
    if (array_search('other',$occupation_input)){
        $occupation = $_POST['other_occu'];
        array_pop($occupation_input);
        $occupation_input = array_merge($occupation_input, [$occupation]);
    }
        // joining the array with ,
        $occupation = implode(',', $occupation_input);
        $gender = '';
        $dob = '';

        if($_POST['type'] == 'individual'){
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];

        }


    
    
    
    // $occupation_input = mysqli_real_escape_string($connection, $occupation_input)


    // var_dump($occupation_input);
    

    // if (!empty($occupation_input)){
    //     foreach($_POST['occupation'] as $selcted_occu){
    //         echo $selcted_occu;
    //     }
    // }


    //error handling
    $signUpURL = PUBLIC_URL . '/signup/';

    if($type == 'group'){
        $signUpURL .= 'group/';
    }
    $errorString = '';
    //checking for username availability
    if(!Account::checkAvailability('name', $username)){
       $errorString .= 'username=error';
    }

    //checking for email availability
    if(!Account::checkAvailability('email', $email)){
        if(!$errorString !== ''){
           $errorString .= '&';
        }
        $errorString .= 'email=error';
    }

    if($password !== $reenter_password){
        if($errorString !== ''){
            $errorString .= '&';
         }
         $errorString .= 'password=error';
    }
    $type = ($type === 'individual') ? 'solo' : 'group'; 
    if(!$errorString){
    $account = AccountBuilder::account()
        ->Handle($username)
        ->DisplayName($name)
        ->Hash(password_hash($password,PASSWORD_DEFAULT))
        ->Email($email)
        ->Type($type)
        ->ProfileType($occupation)
        ->Gender($gender)
        ->DateOfBirth($dob)
        ->build();
   
    Account::create($account);
    header("Location: " . PUBLIC_URL . "/artist/");

}
else{
    //display error messages
    header("Location: " . $signUpURL .'?'. $errorString);

}
    
}
else{
    header("Location: " . PUBLIC_URL . "/signup/");
}
}


}