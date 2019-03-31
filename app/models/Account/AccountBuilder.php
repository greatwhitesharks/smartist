<?php
require_once 'Account.php';

 class AccountBuilder{
	
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
	public $hash;

	public $products;


	private function __construct(){}

	public static function account(){
		return new AccountBuilder();
	}

	public function Id($id){
		$this->id = $id;
		return $this;
	}

	public function Name($name){
		$this->name = $name;
			return $this;
	}

	public function FollowableId($followable_id){
		$this->followable_id = $followable_id;
			return $this;
	}

	public function DisplayName($display_name){
		$this->display_name = $display_name;
			return $this;
	}

	public function Type($type){
		$this->type = $type;
			return $this;
	}

	public function Location($location){
		$this->location = $location;
			return $this;
	}

	public function Bio($bio){
		$this->bio = $bio;
			return $this;
	}

	public function Tel($tel){
		$this->tel = $tel;
			return $this;
	}

	public function Social($social){
		$this->social = $social;
			return $this;
	}

	public function Website($website){
		$this->website = $website;
			return $this;
	}

	public function Photo($photo){
		$this->photo = $photo;
			return $this;
	}

	public function Followers($followers){
		$this->followers = $followers;
			return $this;
	}

	public function Following($following){
		$this->following = $following;
			return $this;
	}

	public function Email($email){
		$this->email = $email;
			return $this;
	}

	public function Hash($hash){
		$this->hash = $hash;
			return $this;
	}

	public function Products($products){
		$this->products = $products;
			return $this;
	}

	public function build(){

		return new Account($this);
	}
}

?>