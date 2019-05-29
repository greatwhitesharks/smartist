<?php

abstract class Controller
{
    public function __construct()
    {
    }

    // To be overidden by extending classes
    public function index($param =''){
        if($param === ''){
            $feed = new FeedController();
            $feed->index();
        }else{
            die('Unsupported Request');
        }
    }

    protected function view($view, $title ='Smartist', $data = [])
    {
        require_once VIEW_PATH . 'Top.php';
        require_once VIEW_PATH   . $view . '.php';
        require_once VIEW_PATH . 'Bottom.php';
    }

    protected function getRequestObj(){
        $input =file_get_contents('php://input');
        $obj = json_decode($input);
        return $obj;
    }
}
