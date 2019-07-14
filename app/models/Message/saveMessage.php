<?php
// Class saveMessage{
// function __construct($id,$subject,$message,$senderId){
//     $conn=DB::getConnection();
//     $sql="insert into messagetable (receiverId,subject,message,senderId) values ('".$id."','".$subject."','".$message."','".$senderId."')";
//     $conn->query($sql);
// }

// }
Class saveMessage{
    function __construct($id,$message,$senderId){
        $conn=DB::getConnection();
        $sql="insert into messagetable (receiverId,message,senderId) values ('".$id."','".$message."','".$senderId."')";
        $conn->query($sql);
    }
    
    }

    