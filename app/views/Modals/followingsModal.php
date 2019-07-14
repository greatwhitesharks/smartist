
<div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Following</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- 
      <div class="search mb-2">
          <input id="follower-search" class="form-control" placeholder="Type a name & press enter to search">
        </div>
  -->


        <ul class="nav nav-tabs" id="followingTabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="artists-tab" data-toggle="tab" href="#artists" role="tab" aria-controls="home" aria-selected="true">Artists</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="hashtags-tab" data-toggle="tab" href="#hashtags" role="tab" aria-controls="profile" aria-selected="false">Hashtags</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active p-2" id="artists" role="tabpanel" aria-labelledby="artists-tab">

  <?php if(key_exists('artists', $data['followings'])): ?>
          <?php foreach ($data['followings']['artists'] as $following) : ?>
            <div class="row">
              <div class="col-2">
                <img width="64" height="64" src="<?= $following->getPhoto() ?>" class="responsive circle d-block">
              </div>
              <div class="col-10 mt-3">
                <a href="<?= PUBLIC_URL . '/artist/' . $following->getHandle() ?>"> <?= $following->getDisplayName() ?>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
          <?php else: ?>
<h6 class="text-center"> Not following any artists</h6>
<?php endif;?>

  </div>
  <div class="tab-pane fade p-2" id="hashtags" role="tabpanel" aria-labelledby="hashtags-tab">

  <?php if(key_exists('hashtags', $data['followings'])): ?>
          <?php foreach ($data['followings']['hashtags'] as $hashtag) : ?>
            <span>
                <a href="<?= PUBLIC_URL . '/hashtag/' . $hashtag ?>"> #<?= $hashtag?>
                </a>
            </span>
             <?php endforeach; ?>
             <?php else: ?>
<h6 class="text-center"> Not following any hashtags</h6>
<?php endif;?>

  </div>



      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



