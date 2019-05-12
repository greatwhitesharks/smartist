<?php


class Account extends Model
{


    // Identification
    public $id;
    public $hash;
    public $type;
    public $followableId;
    public $handle;
    public $displayName;
    public $location;
    public $bio;
    public $tel;
    public $social;
    public $website;
    public $photo;
    public $followers;
    public $following;
    public $profileType;



    // Security
    public $email;
    private $_hash;

    public function __construct($accountBuilder)
    {
        $this->id = $accountBuilder->id;
        $this->type = $accountBuilder->type;
        $this->email = $accountBuilder->email;
        $this->_hash = $accountBuilder->hash;
        $this->followableId = $accountBuilder->followableId;
        $this->handle = $accountBuilder->handle;
        $this->displayName = $accountBuilder->displayName;
        $this->location = $accountBuilder->location;
        $this->bio = $accountBuilder->bio;
        $this->social = $accountBuilder->social;
        $this->website = $accountBuilder->website;
        $this->profileType = $accountBuilder->profileType;
        $this->tel = $accountBuilder->tel;
        $this->photo = $accountBuilder->photo;
        $this->following = $accountBuilder->following;
        $this->followers = $accountBuilder->followers;
    }

   public static function getAccount($id)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where id =' . $id);
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            //TODO: use prepared stmts

            if ($result) {
            
                $account = AccountBuilder::account()
                    ->Id($result['id'])
                    ->handle($result['name'])
                    ->DisplayName($result['display_name'])
                    ->Type($result['type'])
                    ->Email($result['email'])
                    ->Hash($result['password_hash'])
                    ->FollowableId($result['followable_id'])
                    ->build();
                return $account;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    /**
     * Returns the followable_id for an account with the given id
     *
     * This function takes an integer as a parameter and returns the
     * followable_id for that if the account exists. Otherwise the script will
     * exit with an error message.
     *
     * @param int $id id of an account
     *
     * @return int
     **/
   public static function getFollowableId($id)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT followable_id FROM account where id =' . $id);
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();
            return $result['followable_id'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


   public static function updateAccountById($id, $data = [])
    {
        // TODO: use prepared stmts
        if (!empty($data)) {
            $con = DB::getConnection();
            $arr = array();
            foreach ($data as $key=>$value) {
                array_push($arr, $key . ' = ?');
            }


            $sql = 'UPDATE account set ' . implode(', ', $arr) . ' WHERE id = ?';
            echo $sql;

            $statement = $con->prepare($sql);
            $statement->execute(array_merge(array_values($data), [$id]));
        } else {
            throw new Exception('Data array is empty.');
        }
    }

   public static function getProfilePictureById($id)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where id =' . $id);
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();
            return $result['profile_pic'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

   public static function getProfileById($id, $getProducts = false)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where id =' . $id);
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            
            
            if ($result) {
                $account = AccountBuilder::account()
                    ->Id($result['id'])
                    ->Handle($result['name'])
                    ->DisplayName($result['display_name'])
                    ->Type($result['type'])
                    ->Email($result['email'])
                    ->Location($result['location'])
                    ->FollowableId($result['followable_id'])
                    ->Bio($result['bio'])
                    ->Social($result['social'])
                    ->Website($result['website'])
                    ->Tel($result['tel'])
                    ->Photo($result['profile_pic'])
                    ->Followers(Follow::getFollowerCount($result['followable_id']))
                    ->Following(Follow::getFollowingCount($result['id']))
                    ->build();
                return $account;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

   public static function getProfileByName($name, $getProducts = false)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where name =\'' . $name . '\'');
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            if ($result) {
                $account = AccountBuilder::account()
                    ->Id($result['id'])
                    ->DisplayName($result['display_name'])
                    ->Handle($result['name'])
                    ->Type($result['type'])
                    ->Email($result['email'])
                    ->Location($result['location'])
                    ->FollowableId($result['followable_id'])
                    ->Bio($result['bio'])
                    ->Social($result['social'])
                    ->Website($result['website'])
                    ->Tel($result['tel'])
                    ->Photo($result['profile_pic'])
                    ->Followers(Follow::getFollowerCount($result['followable_id']))
                    ->Following(Follow::getFollowingCount($result['id']))
                    ->build();
                return $account;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
