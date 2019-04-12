<?php

class DefaultController extends Controller
{
    public function index()
    {
        header('Temp: Temp', true, 404);
        die('Unsupported Request');
    }
}
