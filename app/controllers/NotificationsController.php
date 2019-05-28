<?php

class NotificationsController{



    public function index(){
        // Show notification page
    }

    public function delete(Type $var = null)
    {
        # code...
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