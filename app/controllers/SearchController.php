<?php


class SearchController extends Controller
{
    public function index($key='')
    {
        // Form ekak http://localhost/smartist/public/search/ url ekata post kaloth
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['key'] === '') {
                // Search field empty error
                header("Location: http://localhost/smartist/public/search/");                
            } else {
                $_key = $_POST['key'];
                header("Location: http://localhost/smartist/public/search/$_key");
            }

            // Post nokara nikan http://localhost/smartist/public/search/ ekata giyoth
        } else {


            if ($key == '') {
                // View method parameters
                // 1 param: view file eke path eka
                // 2 param: Page title eka
                // 3 parameter: Pass karana data 
                self::view('search/index', 'Search', compact('key'));
            } else {
                $products['lyrics'] = Product::findLyrics($key);
                $artists = Account::findArtists($key);
                $filter = 'all';

                //Compact - https://www.php.net/manual/en/function.compact.php#example-6245
                self::view('search/result', 'Search Results', compact('artists', 'products', 'key', 'filter'));
            }
        }
    }


    public function lyrics($key){
        $products['lyrics'] = Product::findLyrics($key);
        $filter = 'lyrics';
        self::view('search/result','Search Results', compact( 'products','key','filter'));
    }

    public function artists($key){
        $artists = Account::findArtists($key);
        $filter = 'artists';
        self::view('search/result','Search Results', compact('artists','key','filter'));
    }

    public function followers($key){

    }

    public function followings($key){
        
    }
}
