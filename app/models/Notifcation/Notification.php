<?php

class Notification  implements JsonSerializable{

    private $message;
    private $sentDate;
    private $readStatus;
    private $sentBy;
    private $type;

    public function __construct($sentBy, $message, $type,
        $sentDate = '', $readStatus='unread')
    {
        $this->sentBy =$sentBy;
        $this->message = $message;
        $this->type = $type;
    }

    
    public function send($recipientId){
        $con = DB::getConnection();
        $sql = 'INSERT INTO notifications'
        .' (recipient_id, message, sent_by, type,sent_date) VALUES(?, ?,?,?, NOW())';

        $stmt = $con->prepare($sql);
        $stmt->execute([
            $recipientId,
            $this->message,
            $this->sentBy,
            $this->type
        ]);
    }

    public static function getUnread($accountId){
        $con = DB::getConnection();
        $sql = 'SELECT FROM notifications WHERE recipient_id = ? AND read_status = \'unread\'';
        $stmt = $con->prepare($sql);
        $stmt->execute([$accountId]);
        
        $notifcations = [];

        while($result = $stmt->fetch()){
            $notifcations[] = new Notification(
                $result['sent_by'],
                $result['message'],
                $result['type'],
                $result['sent_date']
            );
        }

    }

    public static function setAsRead($id){
        $con = DB::getConnection();
        $sql = 'UPDATE notifications SET read_status=\'read\' WHERE id = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
    }

    public static function setAsUnread($id){
        $con = DB::getConnection();
        $sql = 'UPDATE notifications SET read_status=\'unread\' WHERE id = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
    }



    /**
     * Get the value of readStatus
     */ 
    public function getReadStatus()
    {
        return $this->readStatus;
    }

   

    /**
     * Get the value of sentDate
     */ 
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of sentBy
     */ 
    public function getSentBy()
    {
        return $this->sentBy;
    }

    public function jsonSerialize()
    {
        $data = get_object_vars($this);
        return $data;
    }
}