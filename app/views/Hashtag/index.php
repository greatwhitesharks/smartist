<?php
$tag = $data['name'];
$products = $data['products'];

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">#<?= $tag?></h1>
    <p class="lead">Explore products tagged with #<?= $tag?></p>

    <p><small><?=$data['followers']?> <?= ($data['followers'] == 1) ? 'person is' : 'people are' ?> following</small></p>

    <?php if(!$data['following']): ?>

    <form action="<?=PUBLIC_URL . "/hashtag/$tag"?>/follow" method='post'>
      <button class="btn btn-primary btn" href="#" role="button">Follow</button>
    </form>

<?php else: ?>
<form action="<?=PUBLIC_URL . "/hashtag/$tag"?>/unfollow" method='post'>
      <button class="btn btn-primary btn" href="#" role="button">Unfollow</button>
    </form>


<?php endif; ?>



  </div>
</div>

<div class="container">
  
<?php if (count($products) == 0):?>
  <p class="h5 text-center">No products found!</p>
<?php else: ?>




<?php for($i = 0; $i < count($products); $i+=4):?>
<div class="row">

<?php for($j = $i; $j < count($products) && $j < 4; $j++):?>
<?php $product = $products[$j]; ?>
<div class="col-md-3">

<div class="card">
    <img src="<?=PUBLIC_URL?>/images/product.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $product->getTitle()?></h5>
      <p class="card-text"><small class="text-muted">by <a href="<?=PUBLIC_URL.'/artist/' . $product->getAuthor() ?>"><?=$product->getAuthor() ?></a></small></p>
      <p class="card-text"><?=Hashtag::parseHashtags($product->getDescription())?></p>
      <a class="btn btn-primary" href="<?=PUBLIC_URL.'/view/'. $product->getId()?>">View </a>
    </div>
  </div>

</div>
<?php endfor;?>
</div>
  <?php endfor;?>

  

<?php endif; ?>
</div>