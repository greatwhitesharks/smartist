<?php $user = $data['profile'];
$isFollowing = $data['isFollowing'];
$products = $data['products'];

if ($user) {
  ?>
  <div class="container-fluid user-bg">

    <div class="row justify-content-center pt-5" style="color: white;">
      <div class="col-12 col-md-3 justify-content-center">
        <div class="row">
          <div class="col">
            <img src="<?= $user->getPhoto() ?>" width="150" class="img-fluid rounded-circle mx-auto d-block" alt=""></div>
        </div>
        <div class="row">

          <div id="rating-container" class="col ratings justify-content-center my-4" style="text-align:center;color: goldenrod;cursor:pointer;">
            <?php if (!Account::isLoggedIn() || Account::isCurrentUser($user->getId())) : ?>

              <?php for ($i = 5; $i >= 1; $i--) : ?>
                <i class="material-icons" style="color:<?= (($i) <= $user->getRating()) ? 'goldenrod' : 'gray' ?>;">star</i>
              <?php endfor; ?>
            <?php else : ?>
              <?php for ($i = 5; $i >= 1; $i--) : ?>
                <?php $rating = ($data['setRating'] > 0) ? $data['setRating'] : $user->getRating(); ?>
                <?php $checked = (($i) == round($rating)) ? 'checked' : ''; ?>
                <input id="radio<?= $i ?>" class="radio-rate" type="radio" name="rate" value="<?= $i ?>" <?= $checked ?>>
                <label class="lbl-rate material-icons" for="radio<?= $i ?>">
                  star
                </label>
              <?php endfor; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="row">
          <div class="col-3">
            <h3 class="mr-2"><?= $user->getDisplayName() ?></h3>
          </div>
          <div class="col">
            <h5 style="line-height:1.7; color:#cecece;">(<?= $user->getType() ?>)</h5>
              <!--     <?php
                        //if ($user->isOnline) {
                        ?>
                                                <span class="ml-4 badge badge-success">Online</span>
                                 <?php
                                  //  } 
                                  ?> -->
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <h5>@<?= $user->getHandle()  ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php if (($user->getLocation())) : ?>
              <i class="material-icons">
                location_on
              </i>

              <span><?= $user->getLocation() ?></span>
            <?php endif; ?>
          </div>
        </div>
        <div class="row my-4 ">
          <div class="col">
            <?= Hashtag::parseHashtags($user->getBio()) ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-5 mb-5 mb-md-0">

        <div class="row justify-content-end">
          <div class="col-3">
            <?php if (Account::isLoggedIn()) {
              if ($_SESSION[ACCOUNT_IDENTIFIER] == $user->getId()) {
                ?>
                <button type="button" id="editProfile" class="btn btn-light" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>


              <?php
              } else {
                ?>
                <button type="button" class="btn btn-light">Send Message</button>
              <?php
              }
            } ?>
          </div>


        </div>
        <div class="row mt-5 pt-5 justify-content-end">

          <div class="col" style="color: black;">

            <ul class="list-group list-group-horizontal">
              <li class="list-group-item d-flex align-items-center">
                <a class="btn btn-light btn-block" href="#" data-toggle="modal" data-target="#followerModal">
                  Followers
                  <span class="badge badge-primary badge-pill"><?= $user->getFollowers() ?></span>
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="btn btn-light btn-block" href="#" data-toggle="modal" data-target="#followingModal">
                  Following
                  <span class="badge badge-primary badge-pill"><?= $user->getFollowing() ?></span>
                </a>
              </li>
              <?php if (Account::isLoggedIn()) {
                if ($_SESSION[ACCOUNT_IDENTIFIER] != $user->getId()) {
                  if (!$isFollowing) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">


                      <form action='<?= PUBLIC_URL ?>/artist/follow/<?= $user->getFollowableId() ?>/' method="post">
                        <input type="hidden" name="url" value="<?= "http://$_SERVER[HTTP_HOST] $_SERVER[REQUEST_URI]" ?>">
                        <button type='submit' class="btn btn-primary btn-block btn-sm ">Follow </button>
                      </form>
                    </li>

                  <?php
                  } else {
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <form action='./unfollow/<?= $user->getFollowableId() ?>' method="post">
                        <input type="hidden" name="url" value="<?= "http://$_SERVER[HTTP_HOST] $_SERVER[REQUEST_URI]" ?>">
                        <button type='submit' class="btn btn-primary btn-block btn-sm">Unfollow </button>
                      </form>
                    </li>
                  <?php
                  }
                }
              } ?>
            </ul>
          </div>
        </div>
      </div>



    </div>



    <div class="row justify-content-center pt-3 " style="text-align: center;">
      <div class="col-10  justify-content-center-lg col-lg-6 block pt-4">
        <div class="row justify-content-center">
          <h6>Uploads</h6>
        </div>



        <?php

        if (Account::isLoggedIn() && Account::isCurrentUser($user->getId())) {
          ?>
          <div class="row">
            <div class="upload product col m-3 p-5">

              <div class="row justify-content-center">
                <h6>Upload Something</h6>
              </div>
              <div class="row justify-content-center">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisi
                </p>
              </div>
              <div class="row justify-content-center mt-0">
                <button type="button" id="uploadButton" class="btn btn-primary"  data-toggle="modal" data-target="#uploadModal"> <span>Upload</span></button>
              </div>
            </div>

          </div>



        <?php
        } ?>

        <div class="row justify-content-around">
          <?php

          if (!$products) {
            echo '<div class="col-12 mt-5">No uploads</div>';
          } else {
            foreach ($products as $product) :

              ?>


              <div class="product col-8 col-sm-5 mt-3 mt-sm-0 mb-3 flex-row">
                <div class="row">
                  <div class="product-item col px-0" style="position:relative;">
                    <img src="http://localhost/smartist/public/images/product.png" class="d-block img-fluid rounded" alt="">
                    <div class="product-details rounded" style="color:white;position:absolute; bottom:0; height:100%; width:100%; background-color:rgba(0,0,0,0.8);">
                      <h6 class="text-center mt-5"><?= $product->getTitle() ?></h6>
                      <a class="btn btn-success btn-sm text-center" href="<?= PUBLIC_URL . '/view/' . $product->getId() ?>">

                        <span>View</span></a>
                    </div>

                  </div>


                </div>
                <!-- <div class="row justify-content-center mt-1">
                  
                                                    </div> -->

                <!-- <div class="row justify-content-center pb-0">

            
        
                                                                              </div> -->
              </div>

            <?php endforeach;
          } ?>

          <div class="col-5"></div>
        </div>
      </div>
      <div class="col-lg-1">
      </div>
      <div class="col-lg-3 col-10 block pt-4 mt-5 mt-lg-0 mh-50 justify-content-center">
        <h6>Contact Info</h6>
        <hr>
        <?php if (($user->getEmail())) {
          ?>
          <div class="row justify-content-center mb-3">
            <div class="col-2">
              <i class="material-icons">
                email
              </i>
            </div>
            <div class="col-4 col-lg-8 ">
              <div class="row">
                Email:
              </div>
              <div class="row">
                <a href="mailto:<?= $user->getEmail() ?>"><?= $user->getEmail() ?></a>
              </div>
            </div>
          </div>

        <?php
        }

        if ($user->getTel() !== null) {
          ?>
          <div class="row justify-content-center mb-3">
            <div class="col-2">
              <i class="material-icons">
                phone
              </i>
            </div>
            <div class="col-4 col-lg-8">

              <div class="row">
                Phone:
              </div>
              <div class="row">
                <a href="tel:<?= $user->getTel() ?>"><?= $user->getTel() ?></a>
              </div>
            </div>

          </div>

        <?php
        }

        if (($user->getWebsite())) {
          ?>
          <div class="row justify-content-center mb-3">
            <div class="col-2">
              <i class="material-icons">
                link
              </i>
            </div>
            <div class="col-4 col-lg-8">
              <div class="row">
                Website:
              </div>
              <div class="row">
                <a target="blanka" href="<?= $user->getWebsite() ?>"><?= $user->getWebsite() ?></a>
              </div>
            </div>
          </div>
        <?php
        }

        if ($user->getSocial()) {
          ?>
          <div class="row justify-content-center mb-3">
            <div class="col-2">
              <i class="material-icons">
                person
              </i>
            </div>
            <div class="col-4 col-lg-8">
              <div class="row">
                Social Media:
              </div>
              <?php
              foreach ($user->getSocial() as $link) : ?>
                <div class="row">
                  <a href="#"><?= $link ?></a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php
        } ?>

      </div>
    </div>
  <?php
  } else {
    echo '<div class="row mt-5 justify-content-center"> <div class="col-12" style="text-align:center;"> User does not exist</div></div>';
  }   ?>
</div>





<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm" action="<?= PUBLIC_URL ?>/artist/edit" method="post">

          <div class="form-group">
            <label for="location">Location</label>
            <input type="location" class="form-control" id="location" name="location" value="<?= $user->getLocation() ?>" placeholder="Sri Lanka">
          </div>

          <div class="form-group">
            <label for="website">Website</label>
            <input type="website" class="form-control" id="website" name="website" value="<?= $user->getWebsite() ?>" placeholder="www.example.com">
          </div>

          <div class="form-group">
            <label for="tel">Telephone</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="<?= $user->getTel() ?>" placeholder="07XXXXXXXX">
          </div>

          <!--                 <div class="form-group">
    <label for="social">Social Media</label>
    <input type="social" class="form-control" id="social" name="social" value="<?= $user->getSocial()[0] ?>"placeholder="name@example.com">
  </div> -->

          <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3"><?= $user->getBio() ?></textarea>
          </div>
        </form>
        <div class="form-group">
          <form action="<?= PUBLIC_URL ?>/artist/uploadProfileImage" id="fileToUpload" enctype="multipart/form-data" method="post">
            <label for="profile_pic">Profile Picture</label>
            <input type="file" class="form-control" id="profile_pic" name="profile_pic" rows="3"><img id="edit_image" src="<?= $user->getPhoto() ?>">
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" onclick="submitEditProfileForm()" class="btn btn-primary" data-toggle="modal" data-target="#modal" data-dismiss="modal">Save changes</button>

      </div>
    </div>
  </div>
</div>
<!--image config Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Configure Your Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="image" src='#' alt="Picture">
        </div>
      </div>
      <div class="modal-footer">
        <button id="img-upload" type="button"  class="btn btn-secondary" data-dismiss="modal">Submit Your Image</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>








<?php

require_once VIEW_PATH . '/Modals/followingsModal.php';
require_once VIEW_PATH . '/Modals/followersModal.php';



?>




<?php if (Account::isLoggedIn() &&  $user->getId() != $_SESSION[ACCOUNT_IDENTIFIER]) : ?>

  <script type="text/javascript">
    (function() {
      var container = document.getElementById('rating-container');


      container.addEventListener('click', function(e) {
        if (e.target.name === 'rate') {
          var rating = e.target.value;
          console.log(e.target.value);
          var xhr = new XMLHttpRequest();
          xhr.open('POST', '<?= PUBLIC_URL . 'artist/rating/' . $user->getId() ?>', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send('rating=' + rating);


        }
      });

    })();
  </script>
<?php endif; ?>

<script src="<?=PUBLIC_URL?>/cropperjs/dist/cropper.js"></script>


<script>
  window.addEventListener('DOMContentLoaded', function() {
    var image = document.getElementById('image');
    var cropBoxData;
    var canvasData;
    var cropper;
    
    

    $('#modal').on('shown.bs.modal', function() {
      cropper = new Cropper(image, {
        dragMode: 'move',
        aspectRatio: 1,
        center: false,
        highlight: false,
        viewMode: 3,
        ready: function () {
            //Should set crop box data first here
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
          }
      });
    }).on('hidden.bs.modal', function() {
     
  });
  

    $('#img-upload').click(function(){
      cropBoxData = cropper.getCropBoxData();
      canvasData = cropper.getCanvasData();
          
          var canvas = cropper.getCroppedCanvas({
          width: 160,
          height: 160,
          });
          
          canvas.toBlob((blob)=>{


            var fd = new FormData();
            fd.append('profile_pic', blob, 'profile.jpg');
    $.ajax({
      url: "<?= PUBLIC_URL ?>/artist/uploadProfileImage",
      type: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      
    });
          });

          cropper.destroy();
    });
    });

  document.getElementById("profile_pic").onchange = function() {
    var fd = new FormData();
    var files = $('#profile_pic')[0].files[0];
    fd.append('profile_pic', files);
    $.ajax({
      url: "<?= PUBLIC_URL ?>/artist/uploadProfileImage",
      type: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      
    });
   
    $("#modal").modal();
    var min=1; 
    var max=10000; 
    var random =Math.floor(Math.random() * (+max - +min)) + +min; 
    document.getElementById("image").setAttribute("src","<?= PUBLIC_URL ?>/images/profile-pics/<?=$_SESSION[ACCOUNT_IDENTIFIER] . "." ."jpg?dummy="?>".concat(random.toString(10)));
  };
  
  
</script>


<script>
</script>

</html>