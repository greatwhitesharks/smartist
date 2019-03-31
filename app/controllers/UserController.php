

<?php

class UserController extends Controller{

	public function index($parameters = ''){
		$account= null;

	if($parameters){

		$user = $parameters;
		$account = Account::getAccountFromName($user);
	}
	else{
		if(isset($_SESSION['account_id'])){
				$account = Account::getProfile($_SESSION['account_id']);
		}
		else{
			 header('location: /smartist/public/login/');
			exit();
		}
	}			





		$follow = new Follow(DB::getConnection());
		$isFollowing = '';
		if($account){
		$isFollowing = $follow->isFollowing($_SESSION['account_id'], $account->followable_id);
		}

	

     	self::view('user/index', 'User',[$account, $isFollowing]);

	}


	public function upload(){
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);


if( isset($_POST['title']) && isset($_SESSION["accountId"])) {

	$title = $_POST['title'];
	$type = "audio"; // TODO: support other file types
   //TODO: Check file types, santize input etc

	if (file_exists($target_file)) {
    echo "File already exists.";

}


else if ($_FILES["fileUpload"]["size"] > 800000) {
    echo "File too large.";

} else {

   	if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
   			global $connection;
   			$result = mysqli_query($connection, "Insert into products (product_title, product_url, product_type, account_id ) values('" . $title . "','" . $target_file . "','" . $type . "','" . $_SESSION['account_id']. "')") or die(mysqli_error($connection));
      header('location: http://localhost/smartist/public/user/');
    } else {
        echo "Error occured while uploading!";
    }
}




}

	}

	public function logout(){
		session_destroy();
		header('location: http://localhost/smartist/public/login/');
	}

	public function follow($parameters=[]){

		if (isset($_SESSION['account_id'])){
			$followable_id = $parameters[0];
			$current_account = Account::getAccount($_SESSION['account_id']);
			$follow = new Follow(DB::getConnection());
			if ($followable_id != $current_account->followable_id){
				$follow->followFollowable($current_account->id,$followable_id);
			}
			else{
				die('You cannot follow yourself');
			}

		}

		header('Location: ' .$_POST['url']);
			
	}

	public function follow_stat($parameters = []){
			if (isset($_SESSION['account_id'])){

			$current_account = Account::getAccount($_SESSION['account_id']);
				$follow = new Follow(DB::getConnection());
				$followers =$follow->getFollowerCount($current_account->followable_id);
				$following = $follow->getFollowingCount($_SESSION['account_id']);
			
				echo json_encode(array(
					'followers' => $followers,
					'following' => $following

				));
			}
	}

	public function unfollow($parameters=[]){
	
			if (isset($_SESSION['account_id'])){
			$followable_id = $parameters[0];

			$current_account = Account::getAccount($_SESSION['account_id']);
			$follow = new Follow(DB::getConnection());
			if ($followable_id != $current_account->followable_id){
				$follow->unfollowFollowable($_SESSION['account_id'],$followable_id);
			}
			else{
				die('You cannot unfollow yourself');
			}

		}else{
			echo 'Not logged in';
		}
		header('Location: ' . $_POST['url']);
	}


	public function edit(){
		global $connection;
		if(isset($_POST['email'])
		 && isset($_POST['location'])
		  && isset($_POST['website'])
		   && isset($_POST['bio'])
		    && isset($_POST['tel'])){

				$data = array(
					'email' => $_POST['email'],
					'location' => $_POST['location'],
					'website' => $_POST['website'],
					'bio' => $_POST['bio'],
					'tel' => (int)$_POST['tel']
				);

				$account = Account::getAccount($_SESSION['account_id']);
				$account->saveData($data);
	header('location: http://localhost/smartist/public/user/');

		}
	}
}

?>