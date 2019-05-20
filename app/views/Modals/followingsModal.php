
<div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Following</h5>
        <button type="button" onclick="closeFollowingModal();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card p-2">
        <div class="row">
  <div class="col">
  <h5>Artists</h5>
  <hr>
</div>
</div>
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



        <div class="card p-2 mt-4">
          <div class="row">
  <div class="col">
  <h5>Hashtags</h5>
  <hr>
</div>
</div>
<div class="row">
              <div class="col">
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
            </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeFollowingModal();" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>