<?php

require_once "../app/models/message/saveMessage.php";
require_once "../app/models/message/readMessage.php";

class InboxController extends Controller{
 
  function index($parameters =''){
    if (isset($_SESSION['account_id'])){
    $senderId=$_SESSION['account_id'];
    self::view('/Inbox/index', 'Inbox' ,$senderId);
    }
    else{
      echo "Not Signed";
    }
  }

  function sendMessage(){

    $id = $_POST['id'];
    $subject=$_POST['subject'];
    $message =$_POST['message'];
    $senderId=$_SESSION['account_id'];
if ( $id !='' && $message!=''&& $subject!='')
    new saveMessage($id, $subject,$message,$senderId);
     
    header('Location:http://localhost/smartist/public/Inbox');
  
  }
  function run(){
     $rec_id=$_SESSION['account_id'];
     $output=readMessage($rec_id);
     $jout=json_encode($output);
     header('Cache-Control:no-cache');
     echo $jout;
  }
 
} 