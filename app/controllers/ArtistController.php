<?php

class ArtistController extends Controller
{

    

    public function index($parameters = '')
    {
        $profile = null;

        if ($parameters) {
            $user = $parameters;

            $profile = Account::getProfileByName($user);
        } else {
            if (Account::isLoggedIn()) {
                $profile = Account::getProfileById(
                    $_SESSION[ACCOUNT_IDENTIFIER]
                );
            } else {

                header('location: ' . LOGIN_REDIRECT_URL);
                exit();
            }
        }

        $isFollowing = '';
        $products = '';
        $setRating = '';
        $followings = '';
        $followers = '';
        $products = '';
        if ($profile && Account::isLoggedIn()) {
            $isFollowing = Follow::isFollowing(
                $_SESSION[ACCOUNT_IDENTIFIER],
                $profile->getFollowableId()
            );
            $setRating = Rating::getSetRating($_SESSION[ACCOUNT_IDENTIFIER], $profile->getId());
            $setRating = ($setRating) ? $setRating : 0;
            $followers = Follow::getFollowers($profile->getFollowableId());
            $followings = Follow::getFollowings($profile->getId());
            $products = Product::getProducts($profile->getFollowableId());
        }

        self::view('user/index', 'User', compact('profile', 'isFollowing', 'products', 'followers', 'followings', 'setRating'));
    }

    public function rating($id)
    {

        if (isset($_POST['rating']) && Account::isLoggedIn()) {
            if ($_SESSION[ACCOUNT_IDENTIFIER] !== $id) {
                $rating = $_POST['rating'];
                $rating = ($rating > 5) ? 5 : (($rating < 0) ? 0 : $rating);
                Rating::setRating($_SESSION[ACCOUNT_IDENTIFIER], $id, $rating);
            }
        }
    }


    public function upload()
    {


        if (isset($_POST['product_type'])) {
            $uploadStrategy = null;

            if ($_POST['product_type'] == 'lyric') {
                $uploadStrategy = new LyricUploadStrategy();
            } elseif ($_POST['product_type'] == 'audio') {
                $uploadStrategy = new AudioUploadStrategy();
            }
            $uploadStrategy->upload();
        }
    }

    public function logout()
    {
        session_destroy();
        header('location: http://localhost/smartist/public/login/');
    }

    public function follow($parameters = [])
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && Account::isLoggedIn()
        ) {

            $followableId = $parameters[0];

            $currentAccount = Account::getAccountSummary(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            if ($followableId != $currentAccount->getFollowableId()) {
                //TODO: Error handling when the followable doesn't exist
                Follow::followFollowable($currentAccount->getId(), $followableId);
            } else {
                die('You cannot follow yourself');
            }
        }

        header('Location: ' . $_POST['url']);
    }

    public function follow_stat($parameters = [])
    {
        if (Account::isLoggedIn()) {

            $currentAccount = Account::getAccountSummary(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            $followers = Follow::getFollowerCount(
                $currentAccount->getFollowableId()
            );

            $following = Follow::getFollowingCount(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            echo json_encode(
                array(
                    'followers' => $followers,
                    'following' => $following
                )
            );
        }
    }

    public function unfollow($parameters = [])
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && Account::isLoggedIn()
        ) {

            $followableId = $parameters[0];


            $currentAccount = Account::getProfileById(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            if ($followableId != $currentAccount->getFollowableId()) {
                Follow::unfollowFollowable(
                    $_SESSION[ACCOUNT_IDENTIFIER],
                    $followableId
                );
            } else {
                die('You cannot unfollow yourself');
            }
        } else {
            echo 'Not logged in';
        }
        //ie($_POST['url']);
        header('Location: ' . trim($_POST['url']));
    }


    public function edit()
    {
        if (
            isset($_POST['location'])
            && isset($_POST['website'])
            && isset($_POST['bio'])
            && isset($_POST['tel'])
        ) {
            $data = array(
                'location' => $_POST['location'],
                'website' => $_POST['website'],
                'bio' => $_POST['bio'],
                'tel' => (int) $_POST['tel'],
                'profile_pic' => "http://localhost/smartist/public/images/profile-pics/" . (string) $_SESSION[ACCOUNT_IDENTIFIER] . '.' . strtolower(pathinfo(basename($_FILES["profile_pic"]["name"]), PATHINFO_EXTENSION))
            );

            Account::updateAccountById(
                $_SESSION[ACCOUNT_IDENTIFIER],
                $data
            );
        }
         header('location: http://localhost/smartist/public/artist/');
    }


    public function uploadProfileImage()
    {
        $target_dir = "../public/images/profile-pics/";
        $uploadOk = 1;
        
        $imageFileType = strtolower(pathinfo(basename($_FILES["profile_pic"]["name"]), PATHINFO_EXTENSION));
        $target_file = $target_dir . $_SESSION[ACCOUNT_IDENTIFIER] . "." ."jpg";
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["profile_pic"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
        //delete the file.
            if (file_exists($target_file)) {
                unlink($target_file);
                
            }

            
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["profile_pic"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
      
    }
 
}



abstract class UploadStrategy
{

    protected $upload;
    protected $title;
    protected $type;
    protected $description;
    protected $account;
    protected $product;
    protected $filePath;
    protected $hashtags;
    protected $followable_id;
    public function __construct()
    {
        $uploadDir = './uploads/';

        $this->title = (isset($_POST['title'])) ? $_POST['title'] : '';
        $this->hashtags = [];
        $this->description = null;
        // TODO : Check if this is redundant
        if (isset($_POST['description'])) {
            $this->description =  $_POST['description'];
            $matches = [];
            preg_match_all('/#(\w+)/', $this->description, $matches);
            $this->hashtags = array_map('trim', $matches[1]);
        }

        if (count($this->hashtags) > 5) {
            die('Too many hashtags');
        }
        $this->account = Account::getAccountSummary($_SESSION[ACCOUNT_IDENTIFIER]);
        $this->followable_id = $this->account->getFollowableId();

        if (empty($this->title)) {
            die('Title shouldn\'t be empty');
        }

        //TODO: move the Upload handling code out of here

        $folder = time();

        if (!file_exists($uploadDir . $folder)) {
            mkdir($uploadDir . $folder, 0777, true);
        }

        // TODO : Needs a better way to prevent collisions
        $uploadDir = $uploadDir . $folder . '/';

        $this->upload = $_FILES['product'];

        // Error handling
        // TODO : Need improvement
        switch ($this->upload['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                die('File too large');
                break;
            case UPLOAD_ERR_PARTIAL:
                die('File was not completely uploaded');
                break;
            case UPLOAD_ERR_NO_FILE:
                die('No file was uploaded!');
                break;
            case UPLOAD_ERR_OK:
                break;
            default:
                die('An error occured!');
                break;
        }


        // TODO: mp3 mime here, might not work with chrome
        $mimeMap = [
            'txt' => 'text/plain',
            'mp3' => 'audio/mpeg',

        ];

        // Get the mime type of the uploaded file
        // $fileInfo = new finfo($upload['tmp_name'], FILEINFO_MIME);
        $fileInfo = mime_content_type($this->upload['tmp_name']);
        // Check file size
        if ($this->upload['size'] > 5000) {
            // TODO: Need better handling
            die('File too large');
        }



        // Check if the mime is in the supported list ($mimeMap)
        // and save the respective file extention in $ext
        if (!($ext = array_search($fileInfo, $mimeMap))) {

            // TODO: Need better handling
            die('Unsupported file type!');
        }




        $this->type = '';

        switch ($ext) {
            case 'mp3':
                $this->type = 'audio';
            case 'txt':
                $this->type = 'lyric';
        }


        $this->filePath = $uploadDir . sha1_file($this->upload['tmp_name']) . '.' . $ext;

        // Validation done file is ready to be uploaded
        if (!move_uploaded_file($this->upload['tmp_name'], $this->filePath)) {


            // TODO : Handle this error in a better way
            die('Error occured while uploadng file');
        }
    }
    public function upload()
    { }
}

class AudioUploadStrategy extends UploadStrategy
{
    public function upload()
    {
        // $this->type ='audio';
        //TODO: temporray fix by adding 1 as id. need to us
        $this->product = array(
            'title' => $this->title,
            'url' => $this->filePath,
            'type' => $this->type
        );

        Product::createProduct(
            $this->followable_id,
            $this->product,
            $this->hashtags,
            '',
            $this->description,
            $this->account->getHandle()
        );

        header('Location: ' . PUBLIC_URL . '/artist/');
    }
}

class LyricUploadStrategy extends UploadStrategy
{
    public function upload()
    {
        // $this->type ='lyric';
        //TODO: temporray fix by adding 1 as id. need to us
        $this->product = array(
            'title' => $this->title,
            'url' => $this->filePath,
            'type' => $this->type
        );

        $visibility = $_POST['visibility'];

        Product::createProduct(
            $this->followable_id,
            $this->product,
            $this->hashtags,
            file_get_contents($this->filePath),
            $this->description,
            $this->account->getHandle(),
            $visibility
        );

        header('Location: ' . PUBLIC_URL . '/artist/');
    }


   
}
