<div class="row mt-5 mb-3">
<div class="col text-center">
<h3>All Hashtags</h3>
</div>
</div>

<div class="row">
<div class="col-3"> </div>
<div class="col-6 text-center"> 

    <?php if (count($data['tags']) > 0): ?>
    <?php foreach ($data['tags'] as $tag):?>
        <a href="<?=PUBLIC_URL . '/hashtag/'. $tag ?>"><span class="h<?= rand(1,6) ?>"> #<?=$tag?></span></a>
    <?php endforeach;?>

    <?php else: ?>
        <h5>No hashtags yet</h5>
    <?php  endif;?>
</div>
<div class="col-3"> </div>
</div>