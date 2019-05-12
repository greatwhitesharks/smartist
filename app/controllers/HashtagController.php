<?php


class HashtagController extends Controller{


    
    private function handleIndexPost($param1, $param2){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $followableId = 0;
            if($param2 === 'follow'){
                if(!Hashtag::exists($param1)){
                   $followableId =  Hashtag::create($param1);
                }else{
                    $followableId = Hashtag::getFollowableId($param1);
                }
                Follow::followFollowable($_SESSION[ACCOUNT_IDENTIFIER],
                    $followableId);

            }else if($param2 === 'unfollow'){
                $followableId = Hashtag::getFollowableId($param1);
                Follow::unfollowFollowable($_SESSION[ACCOUNT_IDENTIFIER],
                    $followableId);
            }

            header('Location: ' . PUBLIC_URL . "/hashtag/$param1/");
        }
    }

    public function index($param1 = '', $param2 = ''){
      
        $this->handleIndexPost($param1, $param2);
        if($param1){
   
                    $name = $param1;
                    $following = false;
                    $products = [];
                    $followers = 0;
                    if(Hashtag::exists($name)){
                        $followableId =Hashtag::getFollowableId($name);
                        $following = Follow::isFollowing($_SESSION[ACCOUNT_IDENTIFIER],
                            $followableId);
                        $products = Product::getProducts($followableId);
                        $followers = Follow::getFollowerCount($followableId);
                    }
                 
                    $this->view('Hashtag/index', "#$name", compact('name','products','following','followers'));
                

        }
        else{
        print_r (Hashtag::getAll());
        }
    }


}