
<div class="container-fluid">
    <div class="row">
        <div class="col">
<?php


$artists = (array_key_exists('artists', $data)) ? $data ['artists'] : [];
$lyrics = [];

if(array_key_exists('products', $data)){
    if(array_key_exists('lyrics', $data)){
        $lyrics = $data ['products']['lyrics'];
    }
}

$filter =$data['filter'];
$key = $data['key'];

require 'searchForm.php';
require 'searchNav.php';
?>
<div>
<?php   



if (count($artists) ==0 && count ($lyrics )== 0){?>
    <div id="noContent">
        <p><strong>No results found !!!</strong> </p>
    </div>
<?php
}

if (count($artists) !=0){
    foreach ($artists as $ar) {
        echo $ar->getDisplayName();
    }
}

if (count($lyrics) !=0){
    foreach ($lyrics->getTitle() as $name) {
        echo $name;
    }
}

?>
</div>
</div></div>
</div>