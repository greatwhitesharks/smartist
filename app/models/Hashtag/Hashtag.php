<?php

class Hashtag{

    public static function getAll(){
        $con = DB::getConnection();
        $sql = "SELECT name FROM followables WHERE type='hashtag'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $tags = [];

        while($result = $stmt->fetch()){
            $tags[] = $result['name'];
        }
        return $tags;
    }

    public static function create($name){
        $con = DB::getConnection();
        $sql = "INSERT INTO followables (name, type) VALUES(?, 'hashtag')";
        $stmt = $con->prepare($sql);
        $stmt->execute([$name]);
        return $con->lastInsertId();
    }

    public static function getFollowableId($name){
        $con = DB::getConnection();
        $sql = "Select followable_id from followables where name = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->fetch()['followable_id'];
    }


    public static function exists($name){
        $con = DB::getConnection();
        $sql = "Select exists(Select * from followables where type = 'hashtag' and name = ?) as exist";
        $stmt = $con->prepare($sql);
        $stmt->execute([$name]);
        return boolval($stmt->fetch()['exist']);

    }

    private static function getNewTags($all, $existing){
         return array_diff($all, $existing);
    }

    public static function getIds($tags){
        //TODO: Add try catch
        
        $con = DB::getConnection();
        $sql = "Select * from followables where type = 'hashtag' and ";

        $sql .= str_repeat('name = ? or ', count($tags));
        
        //TODO: use better code for the hack
        $sql .= "false";
        
        $stmt = $con->prepare($sql);
        $stmt->execute($tags);
        
        $results = [];
        $existing = [];
        
        while($row = $stmt->fetch()){
            $results[] = $row['followable_id'];
            $existing[] = $row['name'];
        }

        $new = self::getNewTags($tags, $existing);

        foreach($new as $tag){
            $sql = "INSERT INTO followables (name, type) VALUES(? , 'hashtag')";
            $stmt = $con->prepare($sql);
            $stmt->execute([$tag]);
            $results[] = $con->lastInsertId();
        }
        
        return $results;
        
    }

    public static function parseHashtags($text){
        $res = preg_replace('/#(\w+)/','<a href="' . PUBLIC_URL .'/hashtag/$1">$0</a>',$text);
        return $res;
    }




}