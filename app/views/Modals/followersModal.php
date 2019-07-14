<div class="modal fade" id="followerModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div class="search mb-2">
          <input id="follower-search" class="form-control" placeholder="Type a name & press enter to search">
        </div> -->
        <div class="card p-2">
          <?php if(count($data['followers']) > 0) :?>
          <?php foreach ($data['followers'] as $follower) : ?>
            <div class="row">
              <div class="col-2">
                <img width="64" height="64" src="<?= $follower->getPhoto() ?>" class="responsive circle d-block">
              </div>
              <div class="col-10 mt-3">
                <a href="<?= PUBLIC_URL . '/artist/' . $follower->getHandle() ?>"> <?= $follower->getDisplayName() ?>
                </a>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

        <?php else: ?>
  <h6 class="text-center">No followers</h6>
<?php endif;?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>