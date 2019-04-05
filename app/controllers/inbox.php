<?php

require_once "../app/models/saveMessage.php";
require_once "../app/models/readMessage.php";

Class inbox{

  
    function __construct(){
       
    }

    
  function defaultMethod(){
    require_once "../app/views/inbox/inboxPage.php";
   
    }
     
  function sendMessage(){

    $id = $_POST['id'];
    $subject=$_POST['subject'];
    $message =$_POST['message'];
    $senderId="@0001";
if ( $id !='' && $message!=''&& $subject!='')
    new saveMessage($id, $subject,$message,$senderId);
     
    header('Location:http://localhost/MVC/public/inbox');
  
  }
  function run($rec_id){
     $output=readMessage($rec_id);
     $jout=json_encode($output);
     header('Cache-Control:no-cache');
     echo $jout;
  }
 
} 