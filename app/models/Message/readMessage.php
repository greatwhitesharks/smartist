<?php


function  readMessage($rec_id){
    $conn=DB::getConnection();
    $output=array();
    $sql="select id,subject,senderId,message from messagetable where receiverId='". $rec_id."'";
    $rows=$conn->query($sql);
   foreach($rows as $row){
            $arr =array();
            $arr['id'] = $row["id"];
            $arr['senderId'] =  $row["senderId"];
            $arr['sub'] = $row["subject"];
            $arr['msg'] = $row["message"];
              array_push($output, $arr);

   }
  return $output;
}
