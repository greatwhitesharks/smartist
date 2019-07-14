<?php

class FollowController extends Controller{

    public function index($params = ''){

    }


    public function getFollowers($start=0, $end = -1){

    }

    
    public function getFollowings($start=0, $end = -1){

    }

    public function searchFollowings($key){
        if(Account::isLoggedIn()){
            $follower_id = $_SESSION[ACCOUNT_IDENTIFIER];
            print_r(Follow::searchFollowings($follower_id, $key));
        }
     

    }

}