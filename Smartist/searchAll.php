<?php
    include "extra/dbcon.php";
  // include "header.html";
?>

<!-- <nav class="navbar navbar-inverse">
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#" style:"none">ALL</a></li>
                <li><a href="searchPeople.php" style:"none">People</a></li>
                <li><a href="searchArticle.php"  style:"none">Articles</a></li>
            </ul>
        </div>
    </nav> -->

    
<div class="article-container">
<?php
    if (isset($_GET['submit'])){
        if (empty($_GET['key'])){
            header ("Location: search.php?search=empty");
            exit();
        }else{
            $search=mysqli_real_escape_string($conn,$_GET['key']);
        
            $sql2 = "SELECT * FROM posts WHERE (lower(caption) LIKE '%". strtolower($search) ."%') OR ( lower(writer) LIKE '%". strtolower($search)."%');";
            $result2 = mysqli_query($conn,$sql2);
            $queryResult2= mysqli_num_rows($result2);

            if ($queryResult2>0){
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<a href ='article.php?title=".$row['caption']."&writer=".$row['writer']."' ><div class='article-box'>
                    <h3>".$row['caption']."</h3>
                    <p>".$row['writer']."</P>
                    <p>".$row['content']."</p> </div></a>";
                }
            }
            $sql1 = "SELECT * FROM users WHERE (name LIKE '%".$search."%');";
            $result1 = mysqli_query($conn,$sql1);
            $queryResult1= mysqli_num_rows($result1);

            if ($queryResult1>0){
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<a href ='article.php?title=".$row['name']."'><div class='article-box'>
                    <h3>".$row['picture']."</h3>
                    <p>".$row['name']."</P> </div></a>";
                }
            }
            if (($queryResult1 == 0) and ($queryResult2 == 0)){
                header ("Location: search.php?search=notfound");
                exit();
            }
        }
    }
    
    
?>
</div>
</body>
</html>