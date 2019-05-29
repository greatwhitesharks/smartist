<?php

class Rating{

    public static function getRating($id, $type='artist'){
        try {
            $con = DB::getConnection();
           
            $sql = 'SELECT AVG(value) as rating FROM ratings' 
            .' WHERE toId = ? AND type = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$id, $type]);
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

    public static function setRating($byId, $toId, $value, $type='artist'){
        try {
            $con = DB::getConnection();

            $sql = 'INSERT INTO ratings (toId,byId, value, type) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE value = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$toId,$byId,$value,$type,$value]);
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function getSetRating($byId, $toId, $type='artist'){
        try {
            $con = DB::getConnection();

            $sql = 'SELECT value FROM ratings WHERE toId = ? AND byId = ? AND type = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$toId,$byId,$type]);
            return $stmt->fetch()['value'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }



}