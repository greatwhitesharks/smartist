<?php
class AboutController extends Controller{
    function index($parameters =''){
        self::view('/About/index', 'About' ,"");
    }
} 
?>