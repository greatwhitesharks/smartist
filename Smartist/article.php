<?php
    include "extra/dbcon.php";
    include "header.html";
?>

<h2>Article Page</h2>

    
<div class="article-container">
<?php
    $title= mysqli_real_escape_string($conn,$_GET['title']);
    $writer= mysqli_real_escape_string($conn,$_GET['writer']);
    $sql = "SELECt * FROM posts WHERE caption='$title' AND writer='$writer';";
    $result = mysqli_query($conn,$sql);
    $queryResult= mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
        echo "<a href ='article.php?writer=".$row['writer']."'>$writer</a><div class='article-box'>
        <h3>".$row['caption']."</h3>
        <p>".$row['content']."</p> </div>";
    }

?>
</div>
</body>
</html>