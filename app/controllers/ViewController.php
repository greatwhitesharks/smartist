<?php


class ViewController extends Controller
{
    const PREVIEW_LENGTH = 200;


    function index($productId = 0)
    {
        if ($productId == 0) {
            //header('Location: '.PUBLIC_URL);
        } else {
            $product = Product::getProduct($productId);

            if ($product) {
                $data['id'] = $product->getId();
                $data['type'] = $product->getType();
                $data['title'] = $product->getTitle();
                $data['url'] = $product->getUrl();
                $data['status'] = $product->getStatus();
                $data['author'] = $product->getAuthor();
                $data['owner'] = $product->getOwner();
                $data['comments'] = Comment::getCommentByProductId($product->getId());
                $data['already'] = Permission::alradyRequested($_SESSION[ACCOUNT_IDENTIFIER], $data['id']);
                if ($product->getStatus() != 'public') {
                    $data['content'] = substr($product->getTextContent(), 0, self::PREVIEW_LENGTH);
                } else {
                    $data['content'] = $product->getTextContent();
                }
                $data['comments'] =[1];
                if (isset($_SESSION[ACCOUNT_IDENTIFIER])){
                    $data['rating'] = Rating::getSetRating(
                        $_SESSION[ACCOUNT_IDENTIFIER],
                        $product->getId(),
                        'product'
                    );
                }else{
                    $data['rating'] = Rating::getRating($data['id'],'product');
                }
        
                $this->view('Preview/index', 'Preview of ' .  $product->getTitle() . ' by ' . $product->getAuthor(), $data);
            } else {
                die('Invalid product id');
            }
        }
    }

    function ask($id)
    {
        if (isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            $product = Product::getProduct($id);
            $askingUser = Account::getProfileById($_SESSION[ACCOUNT_IDENTIFIER]);

            $notification = new Notification(
                $askingUser->getId(),
                $askingUser->getDisplayName() . ' is asking for permission to view your product',
                'permission'
            );

            $notification->send($product->getOwner());
        }
    }

    public function rating($id){
        if(isset($_POST['rating']) && isset($_SESSION[ACCOUNT_IDENTIFIER])){
            if($_SESSION[ACCOUNT_IDENTIFIER] !== Product::getProduct($id)->getOwner()){
                $rating = $_POST['rating'];
                $rating = ($rating > 5) ? 5 : (($rating < 0 ) ? 0 : $rating);
                Rating::setRating($_SESSION[ACCOUNT_IDENTIFIER],$id, $rating,'product');
            }
        }
    }
}
