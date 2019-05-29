<?php

class NotificationController extends Controller{



    public function index(){
        // Show notification page

        if(!isset($_SESSION[ACCOUNT_IDENTIFIER])){
            header('Location:' . LOGIN_REDIRECT_URL);
        }
        $notification = Notification::getUnread($_SESSION[ACCOUNT_IDENTIFIER]);
        // print_r($notification);
        self::view(
            'notification/index',
            'Notifications',
            compact('notification')
        );
    }

    public function delete(Type $var = null)
    {
        # code...
    }

    public function send(){
        $obj = self::getRequestObject();
        
        if($obj->type =='permission'){
            $acc = Account::getProfileById($_SESSION[ACCOUNT_IDENTIFIER]);
            $product = Product::getProduct($obj->data->id);
            $message = $acc->getDisplayName() 
            . ' wants permision to view your product with the title, <a href="'
            . PUBLIC_URL .'/view/'. $obj->data->id .'">' . $product->getTitle() . '</a>.';
            $notification = new Notification(
                $_SESSION[ACCOUNT_IDENTIFIER],
                $message,
                'permission'
            );

            $notification->send($obj->to);
        }
       
    }

    public function stream(){
        header('Cache-Control: no-cache');
        header('Content-Type: text/event-stream\n\n');

        while(true){
            //Check for new messages
            //Check for new notificaitons
            
        }
    }

}