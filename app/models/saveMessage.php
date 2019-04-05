<?php
Class saveMessage{
function __construct($id,$subject,$message,$senderId){
    require_once '../app/db/db.php'; 
    $sql="insert into messagetable (receiver_id,subject,message,senderId) values ('".$id."','".$subject."','".$message."','".$senderId."')";
    $conn->query($sql);
}

}
