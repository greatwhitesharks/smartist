<?php


class PreviewController extends Controller{
    const PREVIEW_LENGTH = 200;

    
    function index($productId = 0){
        if($productId == 0){
//header('Location: '.PUBLIC_URL);
        }else{
            $product = Product::getProduct($productId);
            
            if ($product){
                $data['type'] = $product->product_type;
                $data['title'] = $product->product_title;
                $data['url'] = $product->product_url;
                $data['status'] = $product->status;
                $data['author'] =$product->author;
                if($product->status == 'hidden'){
                    $data['content'] = substr($product->textContent,0, self::PREVIEW_LENGTH);
                }
                else{
                    $data['content'] = $product->textContent;
                }
                
                $this->view('Preview/index','Preview of ' .  $product->product_title . ' by '. $product->author,$data);
                
            }else{
                die('Invalid product id');
            }
        }
    }
}