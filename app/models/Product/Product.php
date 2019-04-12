<?php

class Product
{
    public $product_id;
    public $product_url;
    public $product_title;
    public $product_type;
    public $followable_id;
    public $account;

    public function __construct($id, $title, $type, $url)
    {
        $this->product_id = $id;
        $this->product_type = $type;
        $this->product_url = $url;
        $this->product_title = $title;
    }
    

    
    public function setAccount($account)
    {
        $this->account = $account;
    }
    
    public static function createProduct($followable_id, $product, $tags)
    {
        
        // Add to product table
        $con = DB::getConnection();
        $sql = 'INSERT INTO prducts (product_title, product_url,'
            . 'product_type) values (?,?,?)';
        
        $stmt = $con->prepare($sql);
        
        $stmt->execute([$product['title'], $product['url'], $product['type']]);
        
       $product_id = $con->lastInsertId();
            
        //TODO : Join the code for hash tag and user to use a single insert     
      
        // Add product rels
        
       // For user
        $sql = 'INSERT INTO product_rels values (?,?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$followable_id, $product_id]);
        
     
        
        
        // For hashtags
        // TODO : improve to use a single insert
        if(count($tag) > 0) {
            $fs = new FollowService();
            $followable_ids = $fs->getHashtagIds($tags);
            
            foreach($followable_ids as $id){
                $sql = 'INSERT INTO product_rels values (?,?)';
                $stmt = $con->prepare($sql);
                $stmt->execute([$id, $product_id]);
            }
        }
            
        // TODO: Notify followers
        // TODO: Stop notifiying twice for the same product
        
    }
    

    public static function addProduct($followable_id, $product)
    {
        
    }

    public static function getProducts($followable_id)
    {
        $con = DB::getConnection();

        $sql = 'SELECT pi.* FROM product_info pi, product_rels pr WHERE pr.followable_id = ? AND pr.product_id = pi.id ';

        $stmt = $con->prepare($sql);

        $stmt->execute([$followable_id]);

        $products = array();
        
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product($result['id'], $result['title'], $result['type'], $result['url']);
            array_push($products, $product);
        }

        return $products;
    }
}
