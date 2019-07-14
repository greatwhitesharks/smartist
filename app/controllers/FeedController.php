<?php
class FeedController extends Controller
{
    public function index($parameters =[])
    {
        
        if(Account::isLoggedIn()){
        $account = Account::getProfileById($_SESSION[ACCOUNT_IDENTIFIER]);
        
        $followers = Follow::getFollowers($account->getFollowableId());
        $followings = Follow::getFollowings($_SESSION[ACCOUNT_IDENTIFIER]);
        $followersCount = Follow::getFollowerCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $followingCount = Follow::getFollowingCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $data = array(
            'followers' =>  $followers,
            'followings' => $followings,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
            'displayName' => $account->getDisplayName(),
            'bio' => Hashtag::parseHashtags($account->getBio()),
            'profilePic' => $account->getPhoto()
         );

        $this->view('feed/index', 'Feed', $data);
    }else{
        header('Location: '. PUBLIC_URL . '/login');
    }
    }

    public function feed($start =0, $offset =10)
    {   
        if (Account::isLoggedIn()) {

            $products = Follow::getFollowingProducts($_SESSION[ACCOUNT_IDENTIFIER],$start, $offset);
            if($products){
                echo json_encode($products);
            }else{
                echo json_encode(null);
            }
            
        }
    }
}
