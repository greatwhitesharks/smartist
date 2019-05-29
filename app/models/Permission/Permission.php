<?php

class Permission{
    private $recipientId;
    private $id;
    private $product;

    public function __construct($id, $recipientId, $product)
    {
        $this->id = $id;
        $this->recipientId = $recipientId;
        $this->product = $product;
    }

    public static function hasPermssion($id, $product){
        try {
            $con = DB::getConnection();

            $sql = 'Select * from view_permissions (viewerId, productId)' 
            .' values(?,?)';
            $stmt = $con->prepare($sql);
            $stmt->execute([$id,$product]);
           

            while($result= $stmt->fetch()){
                if((new DateTime($result['expireDate'])) > (new Date())){
                    return true;
                }
           
            }
            return false;
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function grantPermission($to, $productId, $duration){
        try {
            date_default_timezone_get('Asia/Colombo');
            $con = DB::getConnection();
            $date = new DateTime();
            $date->modify('+ ' . $duration . 'hours');
            $sql = 'Insert into view_permissions (viewerId, productId, expireDate)' 
            .' values(?,?,?)';
            $stmt = $con->prepare($sql);
            $stmt->execute([$to, $productId, $date->format('Y-m-d H:i')]);
           
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function alradyRequested($id, $productId){
        try {
            $con = DB::getConnection();
            $sql = 'Select * from notifications where sent_by = ? AND type =\'permission\' AND rel_id = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$id, $productId]);
            return boolval($stmt->fetch());
           
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }

    public static function revokePermission($to, $productId){
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'DELETE FROM view_permissions' 
            .' WHERE viewerId = ? and productId = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute([$to, $productId]);
           
        } catch (Exception $e) {
            //TODO : Error handling
        }
    }


    public static function getGiven($id){
        try {
            $con = DB::getConnection();
            // delete the record
            $sql = 'Select vp.* from view_permissions vp, product_info pi, account a' 
            .' WHERE a.id = ? and pi.owner_id = a.id and vp.productId = pi.id';
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]);
            $permissions = [];
            while($result = $stmt->fetch()){
                $permissions[] =  new Permission(
                    $result['id'],
                    $result['recipientId'],
                    Product::getProduct($result['productId'])
                );
            }

            return $permissions;
           
        } catch (Exception $e) {
            //TODO : Error handling
        }    }

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of recipientId
     */ 
    public function getRecipientId()
    {
        return $this->recipientId;
    }
}