<?php

abstract class Controller
{
    public function __construct()
    {
    }

    protected function view($view, $title, $data)
    {
        require_once VIEW_PATH . 'Top.php';
        require_once VIEW_PATH   . $view . '.php';
    }
}
