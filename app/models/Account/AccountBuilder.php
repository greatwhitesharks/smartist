<?php
class AccountBuilder
{
    public $id;
    public $email;
    public $hash;
    public $type;
    public $followableId;
    public $handle;
    public $displayName;
    public $location;
    public $bio;
    public $rating;
    public $tel;
    public $social;
    public $website;
    public $photo;
    public $followers;
    public $following;
    public $profileType;

    public $gender;
    public $dateOfBirth;

    private function __construct()
    {
    }

    public static function account()
    {
        return new AccountBuilder();
    }

    public function Id($id)
    {
        $this->id = $id;
        return $this;
    }


    public function Email($email)
    {
        $this->email = $email;
        return $this;
    }

    public function Hash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    public function Type($type)
    {
        $this->type = $type;
        return $this;
    }

    public function Rating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    public function FollowableId($followableId)
    {
        $this->followableId = $followableId;
        return $this;
    }

    public function DisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function Location($location)
    {
        $this->location = $location;
        return $this;
    }

    public function Bio($bio)
    {
        $this->bio = $bio;
        return $this;
    }

    public function Tel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    public function Social($social)
    {
        $this->social = $social;
        return $this;
    }

    public function Website($website)
    {
        $this->website = $website;
        return $this;
    }

    public function Photo($photo)
    {
        if ($photo==null){
            $this->photo ="http://localhost/smartist/public/images/profile-pics/default.png";
       }
       else{
        $this->photo = $photo;
        
       }
       return $this;
    }

    public function Followers($followers)
    {
        $this->followers = $followers;
        return $this;
    }

    public function Following($following)
    {
        $this->following = $following;
        return $this;
    }

    public function ProfileType($profileType)
    {
        $this->profileType = $profileType;
        return $this;
    }

    public function Handle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    public function DateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function Gender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function build()
    {
        return new Account($this);
    }
}
