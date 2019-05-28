<?php


class Comment{

    private $id;
    private $content;
    private $commenter;
    private $product;

    public function __construct($id, $content, $commenter, $product){
        $this->id = $id;
        $this->content = $content;
        $this->commenter =$commenter;
        $this->product = $product;
    }

    public static function add($commenterId, $produtId, $content){
        try{
            $con = DB::getConnection();
            $sql ="INSERT INTO product_comments commenter_id, product_id, content VALUES (?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$commenterId, $produtId, $content]);
        }catch(Exception $ex){

        }
    }

    public static function delete($id){
        try{
            $con = DB::getConnection();
            $sql ="Delete from product_comments where id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]);
        }catch(Exception $ex){

        }
    }

    public static function edit($id, $content){
        try{
            $con = DB::getConnection();
            $sql ="Update product_comments Set content = ? where id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$content, $id]);
        }catch(Exception $ex){

        }
    }

    private static function getCommentFromResult($result){
        $comment = new Comment(
            $result['id'],
            $result['content'],
            Account::getAccountSummary($result['commenter_id']),
            Product::getProduct($result['product_id'])
        );
        return $comment;
    }


    public static function getCommentsByAuthor($commenterId){
        try{
            $con = DB::getConnection();
            $sql ="Select * from product_comments where commenter_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$commenterId]);
            $comments = [];

            while($result = $stmt->fetch()){
                $comments[] = self::getCommentFromResult($result);
            }
            return $comments;
        }catch(Exception $ex){

        }
    }

    public static function getCommentByProductId($productId){
        try{
            $con = DB::getConnection();
            $sql ="Select * from product_comments where product_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$productId]);
            $comments = [];

            while($result = $stmt->fetch()){
                $comments[] = self::getCommentFromResult($result);
            }
            return $comments;
        }catch(Exception $ex){

        }
    
    }

    public static function getAuthorId($id){
        try{
            $con = DB::getConnection();
            $sql ="Select commenter_id from product_comments where id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            return ($result['commenter_id']);
        }catch(Exception $ex){

        }
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of commenter
     */ 
    public function getCommenter()
    {
        return $this->commenter;
    }

    /**
     * Set the value of commenter
     *
     * @return  self
     */ 
    public function setCommenter($commenter)
    {
        $this->commenter = $commenter;

        return $this;
    }

    public function jsonSerialize()
    {
        $data = get_object_vars($this);
        return $data;
    }
}