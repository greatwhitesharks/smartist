<?php


class PreviewController extends Controller{
    const PREVIEW_LENGTH = 200;

    
    function index($productId = 0){
        if($productId == 0){
//header('Location: '.PUBLIC_URL);
        }else{
            $product = Product::getProduct($productId);
            
            if ($product){
                $data['type'] = $product->getType();
                $data['title'] = $product->getTitle();
                $data['url'] = $product->getUrl();
                $data['status'] = $product->getStatus();
                $data['author'] =$product->getAuthor();
                if($product->getStatus() != 'public'){
                    $data['content'] = substr($product->getTextContent(),0, self::PREVIEW_LENGTH);
                }
                else{
                    $data['content'] = $product->getTextContent();
                }
                
                $this->view('Preview/index','Preview of ' .  $product->getTitle() . ' by '. $product->getAuthor(),$data);
                
            }else{
                die('Invalid product id');
            }
        }
    }
}