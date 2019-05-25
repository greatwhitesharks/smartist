<?php


class Account extends Model
{


    // Identification
    private $id;
    private $hash;
    private $type;
    private $followableId;
    private $rating;
    private $handle;
    private $displayName;
    private $location;
    private $bio;
    private $tel;
    private $social;
    private $website;
    private $photo;
    private $followers;
    private $following;
    private $profileType;



    // Security
    private $email;
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
        $this->rating = $accountBuilder->rating;
        $this->social = $accountBuilder->social;
        $this->website = $accountBuilder->website;
        $this->profileType = $accountBuilder->profileType;
        $this->tel = $accountBuilder->tel;
        $this->photo = $accountBuilder->photo;
        $this->following = $accountBuilder->following;
        $this->followers = $accountBuilder->followers;
    }

    public static function getAccountSummary($id)
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
    public static function getFollowableIdById($id)
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

    public static function  getAccount($key = 'id', $value)
    {
        try {
            $con = DB::getConnection();
            $sql = "SELECT * FROM account where  $key = '$value'";
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
                    ->Rating(Rating::getRating($result['id']))
                    ->Followers(Follow::getFollowerCount($result['followable_id']))
                    ->Following(Follow::getFollowingCount($result['id']))
                    ->build();
                return $account;
            }
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
            foreach ($data as $key => $value) {
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

    public static function getProfileById($id)
    {
        return self::getAccount('id', $id);
    }

    public static function getProfileByName($name)
    {
        return self::getAccount('name',$name);
    }


    public static function getProfileByFolowableId($id)
    {
        return self::getAccount('followable_id', $id);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of hash
     */ 
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of followableId
     */ 
    public function getFollowableId()
    {
        return $this->followableId;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Get the value of handle
     */ 
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Get the value of displayName
     */ 
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the value of bio
     */ 
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Get the value of social
     */ 
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * Get the value of website
     */ 
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Get the value of followers
     */ 
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Get the value of following
     */ 
    public function getFollowing()
    {
        return $this->following;
    }

    /**
     * Get the value of profileType
     */ 
    public function getProfileType()
    {
        return $this->profileType;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
}
