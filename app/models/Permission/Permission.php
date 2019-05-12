<?php

class Permission{

    public static function grantPermission($to, $productId, $duration){
        try {
            $con = DB::getConnection();
            $date = new DateTime();
            $date->modify('+ ' . $duration . 'hours');
            $sql = 'Insert into view_permissions (viewerId, productId, expireDate)' 
            .' values(?,?,?)';
            $stmt = $con->prepare($sql);
            $stmt->execute([$to, $productId, $date]);
           
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function revokePermission($to, $productId){
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'DELETE FROM view_permissions' 
            .' WHERE viewerId = ? and productId = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$to, $productId]);
           
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }
}