<?php


// function  readMessage($rec_id){
//     $conn=DB::getConnection();
//     $output=array();
//     $sql="select id,subject,senderId,message from messagetable where receiverId='". $rec_id."'";
//     $rows=$conn->query($sql);
//    foreach($rows as $row){
//             $arr =array();
//             $arr['id'] = $row["id"];
//             $arr['senderId'] =  Account::getProfileById($row["senderId"])->getHandle();
//             $arr['sub'] = $row["subject"];
//             $arr['msg'] = $row["message"];
//               array_push($output, $arr);

//    }
//   return $output;
// }

function  readMessage($id, $id2){
 
  $conn=DB::getConnection();
  $output=array(); 
  $sql="select * from messagetable where  (senderId = ? and receiverId = ?) or (receiverId = ? and senderId = ?) order by date desc";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id, $id2, $id, $id2]);

while($row = $stmt->fetch()){

          $arr =array();
          $arr['id'] = $row["id"];
          $arr['senderId'] =  Account::getProfileById($row["senderId"])->getHandle();
          $arr['msg'] = $row["message"];
          array_push($output, $arr);

 }
return $output;
}
