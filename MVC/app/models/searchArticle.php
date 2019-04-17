<?php
    include "extra/dbcon.php";
?>

    
<div class="article-container">
<?php

    if (isset($_GET['submit'])){
        if (empty($_GET['key'])){
            header ("Location: search.php?search=empty");
            exit();
        }else{
            $search=mysqli_real_escape_string($conn,$_GET['key']);
            $sql = "SELECt * FROM posts WHERE lower(caption) LIKE '%strtolower($search)%' or writer LIKE '%strtolower($search%';";
            $result = mysqli_query($conn,$sql);
            $queryResult= mysqli_num_rows($result);

            if ($queryResult>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href ='article.php?title=".$row['caption']."&writer=".$row['writer']."'><div class='article-box'>
                    <h3>".$row['caption']."</h3>
                    <p>".$row['writer']."</P>
                    <p>".$row['content']."</p> </div></a>";
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