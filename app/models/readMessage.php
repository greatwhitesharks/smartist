<?php


function  readMessage($rec_id){
    require_once '../app/db/db.php'; 
    $output=array();
    $sql="select id,subject,senderId,message from messagetable where receiver_id='". $rec_id."'";
    $rows=$conn->query($sql);
   foreach($rows as $row){
            $arr =array();
            $arr['id'] = $row["id"];
            $arr['senderId'] =  $row["senderId"];;
            $arr['sub'] = $row["subject"];
            $arr['msg'] = $row["message"];
              array_push($output, $arr);

   }
  return $output;
}
