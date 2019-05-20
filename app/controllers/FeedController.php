<?php
class FeedController extends Controller
{
    public function index($parameters =[])
    {
        
        if(isset($_SESSION[ACCOUNT_IDENTIFIER])){
        $account = Account::getProfileById($_SESSION[ACCOUNT_IDENTIFIER]);
        
        $followers = Follow::getFollowers($account->followableId);
        $followings = Follow::getFollowings($_SESSION[ACCOUNT_IDENTIFIER]);
        $followersCount = Follow::getFollowerCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $followingCount = Follow::getFollowingCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $data = array(
            'followers' =>  $followers,
            'followings' => $followings,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
            'displayName' => $account->getDisplayName(),
            'bio' => Hashtag::parseHashtags($account->geBio()),
            'profilePic' => $account->getPhoto()
         );

        $this->view('/feed/index', 'Feed', $data);
    }else{
        echo 'Login!';
    }
    }

    public function feed($parameters = [])
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
          
            $products = Follow::getFollowingProducts($_SESSION[ACCOUNT_IDENTIFIER]);
            echo json_encode($products);
        }
    }
}
