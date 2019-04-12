<?php

class ArtistController extends Controller
{
    public function index($parameters = '')
    {
        $profile = null;

        if ($parameters) {
            $user = $parameters;
            $accountService = new AccountService();
            $profile = $accountService->getProfileByName($user);
        } else {    
            if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
                $profile = $accountService->getProfileById(
                    $_SESSION[ACCOUNT_IDENTIFIER]
                );
            } else {
                header('location: ' . LOGIN_REDIRECT_URL);
                exit();
            }
        }

        $followService = new FollowService(DB::getConnection());
        $isFollowing = '';

        if ($profile && isset($_SESSION[''])) {
            $isFollowing = $followService->isFollowing(
                $_SESSION[ACCOUNT_IDENTIFIER],
                $profile->followableId
            );
        }



        self::view('user/index', 'User', 
            [
                'profile' =>$profile, 
                'isFollowing' => $isFollowing
            ]);
    }


    public function upload()
    {
        
        $title = (isset($_POST['product_title'])) ? $_POST['product_title'] : '';
        $hashtags = [];
        
        // TODO : Check if this is redundant
        if(isset($_POST['hashtags']) && !empty($_POST['hashtags'])){
            $hashtags = explode(',',$_POST['hashtags']);
        }
        
        $as = new AccountService();
        $followable_id = $as->getFollowableId($_SESSION[ACCOUNT_IDENTIFIER]);
        
        
        if(empty($title)){
            die('Title shouldn\'t be empty');
        }
        
        //TODO: move the Upload handling code out of here
        
        // TODO : Needs a better way to prevent collisions
        $uploadDir = './uploads/' . time() . '/';
        
        $upload = $_FILES['product'];
        
        // Error handling
        // TODO : Need improvement
        switch($upload['error']){
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
        $fileInfo = new finfo($upload['tmp_name'], FILEINFO_MIME);
       
        // Check file size
        if($upload['size'] > 5000){
            // TODO: Need better handling
            die('File too large');
        }
        
        
        
        // Check if the mime is in the supported list ($mimeMap)
        // and save the respective file extention in $ext
        if(!($ext = array_search($fileInfo, $mimeMap))){
            
            // TODO: Need better handling
            die('Unsupported file type!');
        }
        
        
        
        
        $type = '';
        
        switch($ext){
            case 'mp3':
                $type = 'audio';
            case 'txt':
                $type ='lyric';
                
        }
        
        
        $filePath = $uploadDir . sha1_file($upload['tmp_name']) . '.'. $ext;
        
        // Validation done file is ready to be uploaded
        if(move_uploaded_file($upload['tmp_name'], $filePath)){
            
            
            //TODO: temporray fix by adding 1 as id. need to us
           $product = array(
               'title' => $title,
               'url' => $filePath,
               'type' => $type
           );
           
           Product::addProduct($followable_id, $product, $hashtags);
            
            
            echo ('File uploaded successfully');
        }else{
            
            // TODO : Handle this error in a better way
            die('Error occured while uploadng file');
        }
        
        
        
/*         $target_dir = "./uploads/" ;
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $_FILES[]

        if (isset($_POST['title']) && isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $title = $_POST['title'];
            $type = "audio";
            // TODO: support other file types
            //TODO: Check file types, santize input etc

            if (file_exists($target_file)) {
                echo "File already exists.";
            } elseif ($_FILES["fileUpload"]["size"] > 800000) {
                echo "File too large.";
            } else {
                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                    global $connection;
                    $result = mysqli_query(
                        $connection,
                        "Insert into products (product_title, product_url,"
                         . "product_type, account_id ) values('"
                         . $title . "','"
                         . $target_file . "','"
                         . $type . "','" .
                          $_SESSION[ACCOUNT_IDENTIFIER] . "')"
                    ) or die(mysqli_error($connection));

                    header('location: http://localhost/smartist/public/user/');
                } else {
                    echo "Error occured while uploading!";
                }
            }
        } */
    }

    public function logout()
    {
        session_destroy();
        header('location: http://localhost/smartist/public/login/');
    }

    public function follow($parameters = [])
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $followableId = $parameters[0];

            $accountsService = new AccountsService();


            $currentAccount = $accountsService->getAccount(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            $followService = new FollowService(DB::getConnection());

            if ($followableId != $currentAccount->followableId) {
                //TODO: Error handling when the followable doesn't exist
                $followService->followFollowable($currentAccount->id, $followableId);
            } else {
                die('You cannot follow yourself');
            }
        }

        header('Location: ' . $_POST['url']);
    }

    public function follow_stat($parameters = [])
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $accountsService = new AccountsService();
            $followService = new FollowService(DB::getConnection());

            $currentAccount = $accountsService->getAccount(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            $followers = $followService->getFollowerCount(
                $currentAccount->followableId
            );

            $following = $followService->getFollowingCount(
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
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $followableId = $parameters[0];
            $accountsService = new AccountsService();
            $followService = new FollowService(DB::getConnection());

            $currentAccount = $accountsService->getAccount(
                $_SESSION[ACCOUNT_IDENTIFIER]
            );

            if ($followableId != $currentAccount->followableId) {
                $followService->unfollowFollowable(
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
        if (isset($_POST['email'])
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

            $accountsService = new AccountsService();

            $accountsService->updateAccountById(
                $_SESSION['ACCOUNT_IDENTIFIER'],
                $data
            );
            header('location: http://localhost/smartist/public/user/');
        }
    }
}
