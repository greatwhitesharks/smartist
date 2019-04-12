<?php

/**
 * AccountsService
 *
 * This class provides services related to account information 
 * stored in the MySQL database
 *
 */

class AccountService
{

    /**
     * Undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getAccount($id)
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
                    ->Name($result['name'])
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
    public function getFollowableId($id)
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


    public function updateAccountById($id, $data = [])
    {
        // TODO: use prepared stmts
        if (!empty($data)) {
            $con = DB::getConnection();
            $arr = array();
            foreach ($data as $key) {
                array_push($arr, $key . ' = ?');
            }


            $sql = 'UPDATE account set ' . implode(', ', $arr) . ' WHERE id = ?';
            // echo $sql;

            $statement = $con->prepare($sql);
            $statement->execute(array_merge(array_vales($data), [$id]));
        } else {
            throw new Exception('Data array is empty.');
        }
    }

    public function getProfilePictureById($id)
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

    public function getProfileById($id, $getProducts = false)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where id =' . $id);
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            //TODO: use prepared stmts
            $follow = new FollowService($con);
            
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
                    ->Followers($follow->getFollowerCount($result['followable_id']))
                    ->Following($follow->getFollowingCount($result['id']))
                    ->build();
                return $account;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getProfileByName($name, $getProducts = false)
    {
        try {
            $con = DB::getConnection();
            $sql = ('SELECT * FROM account where name =\'' . $name . '\'');
            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            //TODO: use prepared stmts
            $follow = new FollowService($con);

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
                    ->Followers($follow->getFollowerCount($result['followable_id']))
                    ->Following($follow->getFollowingCount($result['id']))
                    ->build();
                return $account;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
