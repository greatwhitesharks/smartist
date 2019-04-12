<?php
class FeedController extends Controller
{
    public function index($parameters =[])
    {
        $account = Account::getProfile($_SESSION[ACCOUNT_IDENTIFIER]);
        $followService = new FollowService(DB::getConnection());

        $followers = $follow->getFollowerCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $following = $follow->getFollowingCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $data = array(
            'followers' =>  $followers,
            'following' => $following,
            'display_name' => $account->display_name,
            'bio' => $account->bio,
            'profile_pic' => $account->photo
         );

        $this->view('/feed/index', 'Feed', $data);
    }

    public function feed($parameters = [])
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $follow = new Follow(DB::getConnection());
            $products = $follow->getFollowingProducts($_SESSION[ACCOUNT_IDENTIFIER]);
            echo json_encode($products);
        }
    }
}
