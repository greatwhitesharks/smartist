    <?php

class Follow
{

    public static function isFollowing($follower_id, $followable_id)
    {
        try {
            $con = DB::getConnection();
            // create a new record
            $sql = 'SELECT EXISTS(SELECT * from ' 
            . FOLLOW_TABLE 
            . ' WHERE follower_id = ? AND followable_id = ?) as following';

            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return boolval($result['following']);
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }
    
    public static function followFollowable($follower_id, $followable_id)
    {
        try {

            $con = DB::getConnection();
            // create a new record
            $sql = 'INSERT INTO ' 
            . FOLLOW_TABLE 
            . ' (follower_id, followable_id) VALUES (?, ?)';

            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function unfollowFollowable($follower_id, $followable_id)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'DELETE FROM ' . FOLLOW_TABLE 
            . ' WHERE follower_id = ? AND followable_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id, $followable_id]);
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function getFollowers($followable_id)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT follower_id FROM ' . FOLLOW_TABLE 
            . ' WHERE followable_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$followable_id]);
            $followers = $stmt->fetch(PDO::FETCH_ASSOC);

            return $followers;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }
    
    
    public static function getFollowings($follower_id)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT followable_id FROM ' . FOLLOW_TABLE 
            . ' WHERE follower_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id]);
            $followings = $stmt->fetch(PDO::FETCH_ASSOC);

            return $followings;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function getFollowingProducts($follower_id)
    {
        try {
            $followable_id = Account::getFollowableId($follower_id);
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT distinct pi.* FROM ' . FOLLOW_TABLE 
            . ' f, product_rels pr, product_info pi '
            .' WHERE f.follower_id = ?'
            . 'AND pr.followable_id = f.followable_id '
            .' and pi.id =  pr.product_id' ;

            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id]);
            $products = array();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
               // $account = Account::getProfileByName();
                $product = new Product(
                    $result['id'], 
                    $result['title'], 
                    $result['type'], 
                    $result['url'],
                    $result['description']
                );
                $product->setAuthor($result['author']);
                array_push($products, $product);
            }

            return $products;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function getFollowerCount($followable_id)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT count(follower_id) as follower_count FROM '
            . FOLLOW_TABLE . ' WHERE followable_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$followable_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['follower_count'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function getFollowingCount($follower_id)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT count(followable_id) as following_count FROM ' 
            . FOLLOW_TABLE . ' WHERE follower_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['following_count'];
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }
}
