<?php

abstract class Controller
{
    public function __construct()
    {
    }

    protected function view($view, $title ='Smartist', $data = [])
    {
        require_once VIEW_PATH . 'Top.php';
        require_once VIEW_PATH   . $view . '.php';
        require_once VIEW_PATH . 'Bottom.php';
    }
}
