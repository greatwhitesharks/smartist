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

?>


<div class="container-fluid">
  <?php  
require 'searchForm.php';
require 'searchNav.php';
?>

<div class="row">
    <div class="col">
<?php   



if (count($artists) ==0 && count ($lyrics )== 0){?>





    
<?php
}
?>
<?php if ($filter != 'lyrics'):?>
    <div class="card p-2 mb-3">
        <div class="card-header">
    <h5><strong>Artists</strong></h5>
</div>
<div class="card-body">

<?php
if (count($artists) == 0){?>
<p><strong>No results found !!!</strong> </p>
    
        <?php
        }else {
            ?>
            <div class="row mt-4">
                <?php
    foreach ($artists as $ar) {?>




        <div class="col-2 mt-4">
           <div class="row">
              <div class="col">
                <img width="64" height="64" src="<?= $ar->getPhoto() ?>" class="responsive circle d-block" style="float:right;">
              </div>
              <div class="col mt-3 sm-text-center">
                <a href="<?= PUBLIC_URL . '/artist/' . $ar->getHandle() ?>"> <?= $ar->getDisplayName() ?>
                </a>
              </div>
    </div>
    </div>


       

        <?php
    }
?>
    </div>


</div>

</div>


<?php
}?>
<?php endif;?>
</div>
</div>
<?php if ($filter != 'artists'):?>


    <div class="row">
    <div class="col" >
    <div class="card p-2">
        <div class="card-header">
    <h5><strong>Products</strong></h5>
</div>
<div class="card-body">

<?php



if (count($lyrics) ==0){

    ?>
<p><strong>No results found !!!</strong> </p>
    
    <?php
}else{
    ?>
    <div class="row">
        <?php
    foreach ($lyrics as $lyric) {?>
       
            <div class="col">
        <?php echo '<a href="' . PUBLIC_URL . '/view/' . $lyric->getId() .'">' .  $lyric->getTitle() . '</a><br>';?>
        by <?=$lyric->getAuthor()->getDisplayName()?>
    <br>
        <?=date_format(new DateTime($lyric->getDate()), 'Y/m/d')?>
</div><?php
    }
    ?>
    
</div>
    <?php
}

?>

</div>
</div>
</div>

</div>

<?php endif;?>
</div></div>
		





<ul class="colorlib-bubbles" style="overflow:hidden">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
</div>

