<?php


class Account extends Model
{


    // Identification
    public $id;
    
    public $hash;
    public $type;
    public $followableId;
    public $handle;
    public $displayName;
    public $location;
    public $bio;
    public $tel;
    public $social;
    public $website;
    public $photo;
    public $followers;
    public $following;
    public $profileType;



    // Security
    public $email;
    private $_hash;

    public function __construct($accountBuilder)
    {
        $this->id = $accountBuilder->id;
        $this->type = $accountBuilder->type;
        $this->email = $accountBuilder->email;
        $this->_hash = $accountBuilder->hash;
        $this->followableId = $accountBuilder->followableId;
        $this->handle = $accountBuilder->handle;
        $this->displayName = $accountBuilder->displayName;
        $this->location = $accountBuilder->location;
        $this->bio = $accountBuilder->bio;
        $this->social = $accountBuilder->social;
        $this->website = $accountBuilder->website;
        $this->profileType = $accountBuilder->profileType;
        $this->tel = $accountBuilder->tel;
        $this->photo = $accountBuilder->photo;
        $this->following = $accountBuilder->following;
        $this->followers = $accountBuilder->followers;
    }
}
