<?php
class FeedController extends Controller{

	public function index($parameters =[]){
		$account = Account::getProfile($_SESSION['account_id']);
		$follow = new Follow(DB::getConnection()	);

		$followers = $follow->getFollowerCount($_SESSION['account_id']);
		$following = $follow->getFollowingCount($_SESSION['account_id']);
		$data = array(
			'followers' =>  $followers,
			'following' => $following,
			'display_name' => $account->display_name,
			'bio' => $account->bio,
			'profile_pic' => $account->photo
		 );

     	self::view('/feed/index', 'Feed' ,$data);
	}

	public function feed($parameters = []){
		if(isset($_SESSION['account_id'])){
		$follow = new Follow(DB::getConnection()	);
				$products = $follow->getFollowingProducts($_SESSION['account_id']);
				echo json_encode($products);
		}
	}

}
?>