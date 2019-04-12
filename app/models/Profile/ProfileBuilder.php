<?php

class ProfileBuilder
{
    public $id;
    public $name;
    public $displayName;
    public $location;
    public $bio;
    public $tel;
    public $social;
    public $website;
    public $photo;
    public $followers;
    public $following;
    

    private function __construct()
    {
    }

    public static function profile()
    {
        return new ProfileBuilder();
    }
    
    

    public function build()
    {
        return new Profile($this);
    }
}
