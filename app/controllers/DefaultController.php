<?php
require_once 'FeedController.php';
class DefaultController extends Controller
{
    public function index($param='')
    {
        if($param === ''){
            $feed = new FeedController();
            $feed->index();
        }else{
            die('Unsupported Request');
        }
      
    }
}
