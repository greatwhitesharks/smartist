<?php
    include "extra/dbcon.php";
   // include "header.html";
?>
<!-- <nav class="navbar navbar-inverse">
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="searchAll.php" style:"none">ALL</a></li>
                <li class="active"><a href="#" style:"none">People</a></li>
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
            $sql = "SELECt * FROM users WHERE name LIKE '%$search%';";
            $result = mysqli_query($conn,$sql);
            $queryResult= mysqli_num_rows($result);

            if ($queryResult>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='article-box'>
                    <p>".$row['picture']."</p>
                    <p>".$row['name']."</P> </div>";
                }

            }else{
                echo "Search result not found !!!";
                header ("Location: search.php");
                exit();
            }
        }

    }



?>
</div>
</body>
</html>