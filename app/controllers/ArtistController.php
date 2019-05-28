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
            if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
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
        if ($profile && isset($_SESSION[ACCOUNT_IDENTIFIER])) {
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

        self::view('user/index', 'User', compact('profile', 'isFollowing', 'products', 'followers','followings','setRating'));
    }

    public function rating($id){

        if(isset($_POST['rating']) && isset($_SESSION[ACCOUNT_IDENTIFIER])){
            if($_SESSION[ACCOUNT_IDENTIFIER] !== $id){
                $rating = $_POST['rating'];
                $rating = ($rating > 5) ? 5 : (($rating < 0 ) ? 0 : $rating);
                Rating::setRating($_SESSION[ACCOUNT_IDENTIFIER],$id, $rating);
            }
        }
    }


    public function upload()
    {

        $uploadDir = './uploads/';
        $title = (isset($_POST['title'])) ? $_POST['title'] : '';
        $hashtags = [];
        $description = null;
        // TODO : Check if this is redundant
        if (isset($_POST['description'])) {
            $description =  $_POST['description'];
            $matches =[];
            preg_match_all('/#(\w+)/', $description, $matches);
           $hashtags = array_map('trim', $matches[1]);
        }

        if(count($hashtags)> 5){
            die('Too many hashtags');
        }
        $account = Account::getAccountSummary($_SESSION[ACCOUNT_IDENTIFIER]);
        $followable_id = $account->getFollowableId();

        if (empty($title)) {
            die('Title shouldn\'t be empty');
        }

        //TODO: move the Upload handling code out of here

        $folder = time();

        if (!file_exists($uploadDir . $folder)) {
            mkdir($uploadDir . $folder, 0777, true);
        }

        // TODO : Needs a better way to prevent collisions
        $uploadDir = $uploadDir . $folder . '/';

        $upload = $_FILES['product'];

        // Error handling
        // TODO : Need improvement
        switch ($upload['error']) {
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
        $fileInfo = mime_content_type($upload['tmp_name']);
        // Check file size
        if ($upload['size'] > 5000) {
            // TODO: Need better handling
            die('File too large');
        }



        // Check if the mime is in the supported list ($mimeMap)
        // and save the respective file extention in $ext
        if (!($ext = array_search($fileInfo, $mimeMap))) {

            // TODO: Need better handling
            die('Unsupported file type!');
        }




        $type = '';

        switch ($ext) {
            case 'mp3':
                $type = 'audio';
            case 'txt':
                $type = 'lyric';
        }


        $filePath = $uploadDir . sha1_file($upload['tmp_name']) . '.' . $ext;

        // Validation done file is ready to be uploaded
        if (move_uploaded_file($upload['tmp_name'], $filePath)) {


            //TODO: temporray fix by adding 1 as id. need to us
            $product = array(
                'title' => $title,
                'url' => $filePath,
                'type' => $type
            );

            Product::createProduct(
                $followable_id, 
                $product, 
                $hashtags, 
                $description,
                $account->getHandle()
            );


            echo ('File uploaded successfully');
        } else {

            // TODO : Handle this error in a better way
            die('Error occured while uploadng file');
        }
    }

    public function logout()
    {
        session_destroy();
        header('location: http://localhost/smartist/public/login/');
    }

    public function follow($parameters = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' 
                && isset($_SESSION[ACCOUNT_IDENTIFIER])) {

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
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' 
                && isset($_SESSION[ACCOUNT_IDENTIFIER])) {

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
        header('Location: ' . $_POST['url']);
    }


    public function edit()
    {
        if (
            isset($_POST['email'])
            && isset($_POST['location'])
            && isset($_POST['website'])
            && isset($_POST['bio'])
            && isset($_POST['tel'])
        ) {
            $data = array(
                'email' => $_POST['email'],
                'location' => $_POST['location'],
                'website' => $_POST['website'],
                'bio' => $_POST['bio'],
                'tel' => (int)$_POST['tel']
            );

            

            Account::updateAccountById(
                $_SESSION[ACCOUNT_IDENTIFIER],
                $data
            );
            header('location: http://localhost/smartist/public/artist/');
        }
    }
}
