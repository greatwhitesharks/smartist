<?php


class CommentController
{


    function add($product_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            if (Product::exists($product_id)) {
                if (isset($_POST['comment']) ) {
                    Comment::add(
                        $_SESSION[ACCOUNT_IDENTIFIER],
                        $product_id,
                        $_POST['comment']
                    );
                }
            }
        }
    }

    function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            if (Comment::getAuthorId($id) === $_SESSION[ACCOUNT_IDENTIFIER]) {
                if (isset($_POST['comment'])) {
                    Comment::edit($id, $_POST['comment']);
                }
            }
        }
    }

    function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION[ACCOUNT_IDENTIFIER])) {
            if (Comment::getAuthorId($id) === $_SESSION[ACCOUNT_IDENTIFIER]) {
                Comment::delete($id);
            }
        }
    }
}
