<?php
function deleteMessage($id){
 $conn=DB::getConnection();
 $sql="delete from messagetable where id= '". $id."'";
 $conn->query($sql);
}
?>