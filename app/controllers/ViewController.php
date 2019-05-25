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
                $data['type'] = $product->getType();
                $data['title'] = $product->getTitle();
                $data['url'] = $product->getUrl();
                $data['status'] = $product->getStatus();
                $data['author'] = $product->getAuthor();
                if ($product->getStatus() != 'public') {
                    $data['content'] = substr($product->getTextContent(), 0, self::PREVIEW_LENGTH);
                } else {
                    $data['content'] = $product->getTextContent();
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

}
