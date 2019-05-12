<?php
class FeedController extends Controller
{
    public function index($parameters =[])
    {
        
        $account = Account::getProfileById($_SESSION[ACCOUNT_IDENTIFIER]);
        

        $followers = Follow::getFollowerCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $following = Follow::getFollowingCount($_SESSION[ACCOUNT_IDENTIFIER]);
        $data = array(
            'followers' =>  $followers,
            'following' => $following,
            'displayName' => $account->displayName,
            'bio' => $account->bio,
            'profilePic' => $account->photo
         );

        $this->view('/feed/index', 'Feed', $data);
    }

    public function feed($parameters = [])
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
          
            $products = Follow::getFollowingProducts($_SESSION[ACCOUNT_IDENTIFIER]);
            echo json_encode($products);
        }
    }
}
