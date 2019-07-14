<?php


require_once "../app/models/follow/follow.php";
require_once "../app/models/message/saveMessage.php";
require_once "../app/models/account/account.php";
require_once "../app/models/message/readMessage.php";
require_once "../app/models/message/deleteMessage.php";
class ChatboxController extends Controller {
    function index($parameters =''){
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])){
        self::view('/Chatbox/index', 'Chatbox' ,"");
        }
        else{
          echo "Not Signed";
        }
      }

function getObservers(){
    $senderId=$_SESSION[ACCOUNT_IDENTIFIER];
    $arr=Follow::getfollowings( $senderId);
    $observers=Follow::getfollowers( $senderId);
    if($observers!=null && array_key_exists("artists",$arr)){
      $observers=array_merge($observers,$arr["artists"]);
      }
    header('Cache-Control:no-cache');
    $jobservers=json_encode($observers);
    echo $jobservers;
}

// function sendMessage()
// {
//   $load = file_get_contents('php://input');
//   $object = json_decode($load, true);
//   $id = filter_var($object['Id'], FILTER_SANITIZE_STRING);
//   $message = filter_var($object['Message'], FILTER_SANITIZE_STRING);
//   $senderId = $_SESSION[ACCOUNT_IDENTIFIER];
//   if ($id != '' && $message != '' && $subject != '')
//     new saveMessage($id,$message,$senderId);
// }
function read($id){
  $rec_id=$_SESSION[ACCOUNT_IDENTIFIER];
  $output=readMessage($rec_id,$id);
  $jout=json_encode($output);
  header('Cache-Control:no-cache');
  echo $jout;
}
}