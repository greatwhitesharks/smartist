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