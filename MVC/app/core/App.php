<?php

class App{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [;

    public function _construct()
    {
        $this -> parseUrl();
     }
     public function parseUrl (){
        if (isset($_GET['url'])){
            echo $_GET['url';
         }
     }
}