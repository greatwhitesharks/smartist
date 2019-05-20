<?php

class Rating{

    public static function getRating($id){
        try {
            $con = DB::getConnection();
           
            $sql = 'SELECT AVG(value) as rating FROM ratings' 
            .' WHERE toId = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $rating = $result['rating'];
            if($rating){
                return $rating;
            }
            else{
                return 0;
            }
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function setRating($byId, $toId, $value){
        try {
            $con = DB::getConnection();

            $sql = 'INSERT INTO ratings (toId,byId, value) VALUES (?,?,?) ON DUPLICATE KEY UPDATE value = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$toId,$byId,$value,$value]);
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function getSetRating($byId, $toId){
        try {
            $con = DB::getConnection();

            $sql = 'SELECT value FROM ratings WHERE toId = ? AND byId = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$toId,$byId]);
            return $stmt->fetch()['value'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }



}