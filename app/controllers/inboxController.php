<?php

require_once "../app/models/message/saveMessage.php";
require_once "../app/models/message/readMessage.php";
require_once "../app/models/message/deleteMessage.php";
class InboxController extends Controller{
 
  function index($parameters =''){
    if (Account::isLoggedIn()){
    $senderId=$_SESSION[ACCOUNT_IDENTIFIER];
    self::view('/Inbox/index', 'Inbox' ,$senderId);
    }
    else{
      echo "Not Signed";
    }
  }

  function sendMessage(){
$load=file_get_contents('php://input');
$object=json_decode($load,true);
var_dump($object);
    $id = filter_var($object['Id'],FILTER_SANITIZE_STRING);
    $id = Account::getProfileByName($id)->getId();
    $subject=filter_var($object['Subject'],FILTER_SANITIZE_STRING);
    $message =filter_var($object['Message'],FILTER_SANITIZE_STRING);
    $senderId=$_SESSION[ACCOUNT_IDENTIFIER];
if ( $id !='' && $message!=''&& $subject!='')
    new saveMessage($id, $subject,$message,$senderId);
     
  
  }
  function run(){
     $rec_id=$_SESSION[ACCOUNT_IDENTIFIER];
     $output=readMessage($rec_id);
     $jout=json_encode($output);
     header('Cache-Control:no-cache');
     echo $jout;
  }
 function delete(){
  $x=file_get_contents('php://input');
  $obj=json_decode($x,true);
  var_dump($obj);
   deleteMessage($obj["idDel"]);
 }
} 