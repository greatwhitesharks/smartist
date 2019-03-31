<?php 

require_once 'AccountBuilder.php';

class Account extends Model{


	// Identification
	public $id;
	public $name;

	// Product binding
	public $followable_id;

	// Profile
	public $display_name;
	public $type;
	public $location;
	public $bio;

	public $tel;
	public $social;
	public $website;

	public $photo;

	public $followers;
	public $following;

	// Security
	public $email;
	private $hash;

	public $products;



	public function __construct($account_builder)
	{
		$this->id = $account_builder->id ;
		$this->name = $account_builder->name ;
		$this->display_name = $account_builder->display_name ;
		$this->type = $account_builder->type ;
		$this->email = $account_builder->email ;
		$this->hash = $account_builder->hash ;
		$this->location = $account_builder->location ;
		$this->followable_id = $account_builder->followable_id ;
		$this->bio = $account_builder->bio ;
		$this->social = $account_builder->social ;
		$this->website = $account_builder->website ;
		$this->tel = $account_builder->tel ;
		$this->photo = $account_builder->photo ;
		$this->following = $account_builder->following;
		$this->followers = $account_builder->followers ;
		$this->products= $account_builder->products;
	}

			

	public function saveData($data=[]){
		// TODO: use prepared stmts
		if (!empty($data)){
		$con = DB::getConnection();
		$arr = array();
		foreach ($data as $key) {
			array_push($arr, $key . ' = ?');
		}


		$sql = 'UPDATE account set ' . implode(', ', $arr).' WHERE id = ?';
		echo $sql;

		$statement = $con->prepare($sql);
		$statement->execute(array_merge(array_vales($data), [$this->id]));

		}
		else{
			throw new Exception('Data array is empty.');
		}
  			
	}

	
	public static function getProfile($id){
		try{
		$con = DB::getConnection();
		$sql= ('SELECT * FROM account where id =' . $id);
			$statement = $con->prepare($sql);
			$statement->execute();
			$result = $statement->fetch();

			//TODO: use prepared stmts
			$follow = new Follow($con);

			if($result){
			$account = AccountBuilder::account()
			->Id($result['id'])
			->Name($result['name'])
			->DisplayName($result['display_name'])
			->Type($result['type'])
			->Email($result['email'])
			->Location($result['location'])
			->FollowableId($result['followable_id'])
			->Bio($result['bio'])
			->Social($result['social'])
			->Website($result['website'])
			->Tel($result['tel'])
			->Photo( $result['profile_pic'])
			->Followers($follow->getFollowerCount($result['followable_id']))
			->Following($follow->getFollowingCount($result['id']))
			->Products(Product::getProducts($result['followable_id']))
			->build();
			return $account;
		}

	}catch(PDOException $e){
			die($e->getMessage());
			}
	}


public static function getAccountFromName($name){
		try{
		$con = DB::getConnection();
		$sql= ('SELECT * FROM account where name =\'' . $name . '\'');
			$statement = $con->prepare($sql);
			$statement->execute();
			$result = $statement->fetch();

			//TODO: use prepared stmts
			$follow = new Follow($con);

			if($result){
			$account = AccountBuilder::account()
			->Id($result['id'])
			->Name($result['name'])
			->DisplayName($result['display_name'])
			->Type($result['type'])
			->Email($result['email'])
			->Location($result['location'])
			->FollowableId($result['followable_id'])
			->Bio($result['bio'])
			->Social($result['social'])
			->Website($result['website'])
			->Tel($result['tel'])
			->Photo( $result['profile_pic'])
			->Followers($follow->getFollowerCount($result['followable_id']))
			->Following($follow->getFollowingCount($result['id']))
			->Products(Product::getProducts($result['followable_id']))
			->build();
			return $account;
		}

	}catch(PDOException $e){
			die($e->getMessage());
			}
	}

	public static function getAccount($id){
		try{
		$con = DB::getConnection();
		$sql= ('SELECT * FROM account where id =' . $id);
			$statement = $con->prepare($sql);
			$statement->execute();
			$result = $statement->fetch();

			//TODO: use prepared stmts
			
			if($result){
			$account = AccountBuilder::account()
			->Id($result['id'])
			->Name($result['name'])
			->DisplayName($result['display_name'])
			->Type($result['type'])
			->Email($result['email'])
			->Hash($result['password_hash'])
			->Location($result['location'])
			->FollowableId($result['followable_id'])
			->Photo( $result['profile_pic'])
			->build();
			return $account;
		}

	}catch(PDOException $e){
			die($e->getMessage());
			}
	}


	public static function getCurrentAccount(){
		return self::$current_account;
	}

	public static function setCurrentAccount($account){
		self::$current_account = $account;
	}


}

?>