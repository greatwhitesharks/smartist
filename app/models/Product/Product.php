<?php

class Product
{
    public $product_id;
    public $product_url;
    public $product_title;
    public $product_type;
    public $followable_id;
    public $description;
    private $textContent;
  
    public $author;
    public $status;

    public function __construct($id, $title, $type, $url)
    {
        $this->product_id = $id;
        $this->product_type = $type;
        $this->product_url = $url;
        $this->product_title = $title;
    }
      
    public static function createProduct($followable_id, $product, $tags, $description='', $author='')
    {
        
        // Add to product table
        $con = DB::getConnection();
        $sql = 'INSERT INTO product_info (title, url,'
            . 'type, author, description) values (?,?,?, ?, ?)';
        
        $stmt = $con->prepare($sql);
        
        $stmt->execute([$product['title'], $product['url'], $product['type'], $author, $description]);
       
       $product_id = $con->lastInsertId();
            
        //TODO : Join the code for hash tag and user to use a single insert     
      
        // Add product rels
        
       // For user
        $sql = 'INSERT INTO product_rels values (?,?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$followable_id, $product_id]);
        
     

        // For hashtags
        // TODO : improve to use a single insert
        if(count($tags) > 0) {
          
            $followable_ids = Hashtag::getIds($tags);
            
            foreach($followable_ids as $id){
                $sql = 'INSERT INTO product_rels values (?,?)';
                $stmt = $con->prepare($sql);
                $stmt->execute([$id, $product_id]);
            }
        }
            
    }
  
    public static function getProduct($product_id){
        $con = DB::getConnection();
        $sql = 'SELECT * from product_info where id = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$product_id]);
        $result = $stmt->fetch();
       
        $product = null;
        if($result){
        $product = new Product(
            $result['id'], 
            $result['title'], 
            $result['type'], 
            $result['url'],
            $result['description']
        );
        
        $product->setAuthor($result['author']);
        $product->setStatus($result['status']);
        if($product->product_type == 'lyric'){
            $product->loadContent();
           
        }
        }
        return $product;
        
    }
    
    public function setAuthor($author){
        $this->author = $author;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function loadContent(){
        if($this->product_type == 'lyric'){
            $fileName = $this->product_url;
            $this->textContent = file_get_contents($fileName);
        
        }else{
        die('Unsupported load content @ Product.php');
        }
    
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

            //TODO: Dont use public fields
            $product->description = $result['description'];
            $product->author = $result['author'];
            array_push($products, $product);
        }

        return $products;
    }

    public static function findLyrics($key){
        $con = DB::getConnection();
        $key = strtolower($key);
        $sql = 'SELECT * FROM product_info WHERE lower(title) like %?% or lower or lower(keywords) like %?% or lower(author) like %?% and status =\'public\'';

        $stmt = $con->prepare($sql);

        $stmt->execute([$key, $key,$key]);
        $lyrics = [];
        while($result = $stmt->fetch()){
            $product = new Product(
                $result['id'],
                $result['title'],
                $result['type'],
                $result['url']
            );
            array_push($lyrics, $result);
        }
    }


    
   
    /**
     * Get the value of product_id
     */ 
    public function getId()
    {
        return $this->product_id;
    }

    /**
     * Get the value of product_url
     */ 
    public function getUrl()
    {
        return $this->product_url;
    }

    /**
     * Get the value of product_title
     */ 
    public function getTitle()
    {
        return $this->product_title;
    }

    /**
     * Get the value of product_type
     */ 
    public function getType()
    {
        return $this->product_type;
    }

    /**
     * Get the value of followable_id
     */ 
    public function getFollowableId()
    {
        return $this->followable_id;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of textContent
     */ 
    public function getTextContent()
    {
        return $this->textContent;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }
}
