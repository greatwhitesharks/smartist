    <?php
use Cake\Core\Exception\Exception;

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

    public static function getFollowers($followable_id,$start = 0, $offset= 5)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT follower_id FROM ' . FOLLOW_TABLE 
            . " WHERE followable_id = :fid limit :start, :offset";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':fid', $followable_id);
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT); 
            $stmt->execute();
       
            $followers =[];

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $followers[] = Account::getProfileById($result['follower_id']);
            }
            return $followers;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function searchFollowings($follower_id, $key)
    {
        try{
            $con = DB::getConnection();
            $sql = 'SELECT fi.* FROM ' . FOLLOW_TABLE 
            . " as fr, followables as fi, account as a WHERE fr.follower_id = ? AND fr.followable_id = fi.followable_id AND fi.type = 'account' AND a.followable_id = fi.followable_id AND (a.name like ? OR a.display_name like ?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id, $key, $key]);

            $followings = [];

            while ($result = $stmt->fetch()){
                $followings['artists'][] = Account::getProfileByFolowableId($result[
                    'followable_id'
                ]);
            }
            
            return $followings;

        }catch(Exception $e){
            echo 'Error occured while accessing the database.';
        }
    }    
    
    public static function getFollowings($follower_id, $start = 0, $offset= 5)
    {
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'SELECT fi.* FROM ' . FOLLOW_TABLE 
            . " as fr, followables as fi WHERE fr.follower_id = :fid AND fr.followable_id = fi.followable_id limit :start, :offset";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':fid', $follower_id, PDO::PARAM_INT);
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT); 
            $stmt->execute();

            $followings = [];

            while ($result = $stmt->fetch()){
               
                if($result['type'] == 'hashtag'){
                    $followings['hashtags'][] = $result['name'];
                }else{
                    $followings['artists'][] = Account::getProfileByFolowableId($result[
                        'followable_id'
                    ]);
                }
            }

            return $followings;
        } catch (Exception $e) {
            //TODO : Error handling
        }

        //return true/false depending on succes
    }

    public static function getFollowingProducts($follower_id,$start=0, $offset = 10)
    {
        try {
            $account = Account::getAccountSummary($follower_id);
            $con = DB::getConnection();
   
            $sql = 'SELECT distinct pi.* FROM ' . FOLLOW_TABLE 
            . ' f, product_rels pr, product_info pi '
            .' WHERE f.follower_id = ? '
            . 'AND pr.followable_id = f.followable_id '
            .' AND pi.id =  pr.product_id ' 
            . "limit $start, $offset";

            $stmt = $con->prepare($sql);
            $stmt->execute([$follower_id]);
            $products = array();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
               // $account = Account::getProfileByName();
            if($result['author'] !== $account->getHandle()){
               $product = new Product(
                    $result['id'], 
                    $result['title'], 
                    $result['type'], 
                    $result['url'],
                    $result['description']
                );
                $author = Account::getProfileByName($result['author']);
                if($author)
                $product->setAuthor($author);
                array_push($products, $product);
            }
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
