<?php

class FollowService
{
    private $con;

    public function __construct()
    {
        $this->con = DB::getConnection();
    }

    public function isFollowing($follower_id, $followable_id)
    {
        try {

            // create a new record
            $sql = 'SELECT EXISTS(SELECT * from ' 
            . FOLLOW_TABLE 
            . ' WHERE follower_id = ? AND followable_id = ?) as following';

            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return boolval($result['following']);
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }
    
    public function followFollowable($follower_id, $followable_id)
    {
        try {


            // create a new record
            $sql = 'INSERT INTO ' 
            . FOLLOW_TABLE 
            . ' (follower_id, followable_id) VALUES (?, ?)';

            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public function unfollowFollowable($follower_id, $followable_id)
    {
        try {

            // delete the record
            $sql = 'DELETE FROM ' . FOLLOW_TABLE 
            . ' WHERE follower_id = ? AND followable_id = ?';
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public function getFollowers($followable_id)
    {
        try {

            // delete the record
            $sql = 'SELECT follower_id FROM ' . FOLLOW_TABLE 
            . ' WHERE followable_id = ?';
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$followable_id]);
            $followers = $stmt->fetch(PDO::FETCH_ASSOC);

            return $followers;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }
    
    public function getHashtagIds($tags){
        //TODO: Add try catch
        $con = DB::getConnection();
        $sql = "Select followable_id from followables where type = `hashtag` and ";

        $sql .= str_repeat('name = ? or ', count($tags));
        
        //TODO: use better code for the hack
        $sql .= "false";
        
        $stmt = $con->prepare($sql);
        $stmt->execute($tags);
        
        $results = [];
        
        while($row = $stmt->fetch()){
            $results[] = $row['followable_id'];
        }
        
        return $results;
        
        
    }

    public function getFollowings($follower_id)
    {
        try {

            // delete the record
            $sql = 'SELECT followable_id FROM ' . FOLLOW_TABLE 
            . ' WHERE follower_id = ?';
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id]);
            $followings = $stmt->fetch(PDO::FETCH_ASSOC);

            return $followings;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public function getFollowingProducts($follower_id)
    {
        try {

            // delete the record
            $sql = 'SELECT distinct pi.*, a.name FROM ' . FOLLOW_TABLE 
            . ' f, product_rels pr, product_info pi, '
            .'account a WHERE f.follower_id = ?'
            . 'AND pr.followable_id = f.followable_id '
            .' and pi.id =  pr.product_id and '
            .' a.followable_id = pr.followable_id';

            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id]);
            $products = array();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $account = Account::getAccountFromName($result['name']);
                $product = new Product(
                    $result['id'], 
                    $result['title'], 
                    $result['type'], 
                    $result['url']
                );
                $product->setAccount($account);
                array_push($products, $product);
            }

            return $products;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public function getFollowerCount($followable_id)
    {
        try {

            // delete the record
            $sql = 'SELECT count(follower_id) FROM '
            . FOLLOW_TABLE . ' WHERE followable_id = ?';
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$followable_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count(follower_id)'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public function getFollowingCount($follower_id)
    {
        try {

            // delete the record
            $sql = 'SELECT count(followable_id) FROM ' 
            . FOLLOW_TABLE . ' WHERE follower_id = ?';
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$follower_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count(followable_id)'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }
}
