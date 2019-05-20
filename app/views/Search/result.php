
<div class="container-fluid">
<?php


$artists = $data ['artists'];
$lyrics = $data ['products']['lyrics'];
$filter =$data['filter'];
$key = $data['key'];

require 'searchForm.php';
    require 'searchNav.php';
?>
<div>
<?php   



if (count($artists) ==0 && count ($lyrics )== 0){?>
    <p>Not results found </p>
<?php
}

if (count($artists) !=0){
    foreach ($artists as $ar) {
        echo $ar->name;
    }
}

if (count($lyrics) !=0){
    foreach ($lyrics->title as $name) {
        echo $name;
    }
}

?>
</div>

</div>