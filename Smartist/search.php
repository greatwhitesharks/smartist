<?php

    include "header.html";

    $filter = '';
    $submit = '';
    $key = '';

    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];

    }

    if(isset($_GET['submit'])){
        $submit = $_GET['submit'];
    }

    if(isset($_GET['key'])){
        $key = $_GET['key'];
    }
   
   
    
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="extra/style.css">
    <div class="container-fluid">
        <div class="search-box">
            <form action="" method="GET">
                <div class="form=group">
                    <h3>Search   :<input type="text" class="form control" placeholder="Name" name="key">
                    <button type="submit" name="submit"><img src="search.png" class="img-responsive" width =50px height="50px"></button> </h3> 
                </div>
            </form>
        </div>
    </div>
<?php   if(isset($_GET['submit'])){ ?>
    <nav class="navbar navbar-inverse">
        <div>
            <ul class="nav navbar-nav">
                <li class="<?= ($filter!='people' && $filter !='article') ? active : '' ?>"><a href="<?="search.php?key=$key&submit=$submit"?>" style:"none">ALL</a></li>
                <li class="<?= ($filter=='people') ? active : '' ?>"><a href="<?="search.php?filter=people&key=$key&submit=$submit"?>" style:"none">People</a></li>
                <li class="<?= ($filter=='article') ? active : '' ?>"><a href="<?="search.php?filter=article&key=$key&submit=$submit"?>"  style:"none">Articles</a></li>
            </ul>
        </div>
    </nav>

<?php }

?>

<?php 
    $error = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($error,"search=empty")==true){
        echo "<p class=error>Search field is empty</p>";
    }
    elseif (strpos($error,"search=notfound")==true){
        echo "<p class=error>Search result not found</p>";
    }
    
    if(isset($_GET['submit'])){

    switch (strtolower($filter)) {
        case 'article':
            require_once 'searchArticle.php';
            break;
        case 'people':
            require_once 'searchPeople.php';
            break; 
        default:
            require_once 'searchAll.php';
            break;
    }
}
?>


</body>
</html>

    