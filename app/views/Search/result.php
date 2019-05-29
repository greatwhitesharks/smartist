
<div class="container-fluid">
<?php


$artists = (array_key_exists('artists', $data)) ? $data ['artists'] : [];
$lyrics = [];

if(array_key_exists('products', $data)){
    if(array_key_exists('lyrics', $data['products'])){
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



if (count($artists) ==0 && count ($lyrics)== 0){?>
    <p>Not results found </p>
<?php
}

if (count($artists) !=0){
    foreach ($artists as $ar) {
        echo $ar->getDisplayName();
    }
}

if (count($lyrics) !=0){
    foreach ($lyrics as $lyric) {
        echo '<a href="' . PUBLIC_URL . '/view/' . $lyric->getId() .'">' .  $lyric->getTitle() . '</a><br>';
    }
}

?>
</div>

</div>