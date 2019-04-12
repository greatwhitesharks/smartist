
<?php $user =$data['profile'];
$isFollowing = $data['isFollowing'];

if ($user) {
    ?>
    <div class="container-fluid user-bg">

        <div class="row justify-content-center pt-5"  style="color: white;"  >
            <div class="col-10 col-sm-2 justify-content-center">
                <div class="row">
                    <div class="col">
                    <img src="<?= $user->photo ?>" width="150" class="img-fluid rounded-circle mx-auto d-block" alt=""></div>
                </div>
                <div class='col'>
                 <div class="row ratings justify-content-center my-4" style="text-align:center;color: goldenrod;" >
                        <i class="material-icons">
                                star
                                </i><i class="material-icons">
                                        star
                                        </i><i class="material-icons">
                                                star
                                                </i><i class="material-icons">
                                                        star
                                                        </i><i class="material-icons">
                                                                star
                                                                </i>

                                                            </div></div>
            </div>    
            <div class="col-3">
                <div class="row">
                    <h3 class="mr-2"><?= $user->displayName?></h3>
                    <h5 style="line-height:1.7; color:#cecece;">(<?= $user->type ?>)
                    <!--     <?php
                        if ($user->isOnline) {
                            ?>
                        <span class="ml-4 badge badge-success">Online</span>
                   <?php
                        } ?> -->
                </div>
                <div class="row mb-2">
                  <h5>@<?= $user->handle  ?></h5>
                </div>
                <div class="row">
                <i class="material-icons">
                    location_on
                    </i>
          
                   <span><?= $user->location ?></span>
                </div>
                <div class="row my-4 ">
                    <?= $user->bio ?>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-5 mb-md-0">
            
                <div class="row justify-content-end">
                <div class="col-3">
                      <?php  if (isset($_SESSION['account_id'])) {
                            if ($_SESSION['account_id']== $user->id) {
                                ?>
                                 <button type="button" id="editProfile" class="btn btn-light">Edit Profile</button>

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
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Followers
    <span class="badge badge-primary badge-pill"><?= $user->followers ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Following
    <span class="badge badge-primary badge-pill"><?= $user->following ?></span>
  </li>
   <?php  if (isset($_SESSION['account_id'])) {
                            if ($_SESSION['account_id']!= $user->id) {
                                if (!$isFollowing) {
                                    ?>                     
  <li class="list-group-item d-flex justify-content-between align-items-center">
        <form action='./follow/<?= $user->followable_id?>' method="post">
              <input type="hidden" name="url" value="<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>">
       <button  type='submit' class="btn btn-primary flex-wrap">Follow </button>
   </form>
  </li>

<?php
                                } else {
                                    ?>
  <li class="list-group-item d-flex justify-content-between align-items-center">
        <form action='./unfollow/<?= $user->followableId?>' method="post">
            <input type="hidden" name="url" value="<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>">
       <button  type='submit' class="btn btn-primary flex-wrap">Unfollow </button>
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
           
                       
                    <div class="row justify-content-center">
                           <?php
                      
                            if (isset($_SESSION['account_id']) && $user->id == $_SESSION['account_id']) {
                                ?>
                                      <div class="upload product col-8 col-sm-5 p-5">
                             
                                    <div class="row justify-content-center">
                                        <h6>Upload a sample</h6>
                                    </div>
                                    <div class="row">
                            
                                        Lorem ipsum dolor sit amet, consectetur adipisi

               
                                    </div>
                                    <div class="row justify-content-center mt-4">
                                            <button type="button" id="uploadButton" class="btn btn-primary"> <span>Upload</span></button>
                                        </div>
                                                         </div>

                            <?php
                            }

    if ($user->id != $_SESSION['account_id'] && !$user->products) {
        echo '<div class="col-12 mt-5">No uploads</div>';
    } else {
        foreach ($user->products as $product):
 
                                ?>
                            <div class="product col-8 col-sm-5 mt-3 mt-sm-0 mb-3 flex-row">
                                <div class="row justify-content-end">
                                    <div class="col">
                                            <img height="200" src="http://localhost/smartist/public/images/product.svg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            
                                    </div>
                                
      
                                </div>
                                <div class="row justify-content-center">
                                    <h6><?= $product->product_title ?></h6>
                                </div>

                               <!--  <div class="row justify-content-center pb-3">

                                    <?php if ($product->product_type =="audio") {
                                    ?>
                                        <button type="button" class="btn btn-primary"> <i class="material-icons">
                                                play_arrow
                                                </i> <span>Play</span></button>
                                    <?php
                                } else {
                                    ?>

                                     <button type="button" class="btn btn-primary"> <i class="material-icons">
                                                view
                                                </i> <span>View</span></button> 
                                            <?php
                                } ?>
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
                    <?php if (isset($user->email)) {
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
                                <a href="mailto:"><?= $user->email ?></a>
                                </div>
                            </div>
                    </div>

                    <?php
    }

    if (isset($user->tel)) {
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
                                    <a href="tel:"><?= $user->tel ?></a>
                                    </div>
                                </div>
                                
                        </div>

                        <?php
    }

    if (isset($user->website)) {
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
                                        <a href="#"><?= $user->website ?></a>
                                        </div>
                                    </div>
                            </div>
                       <?php
    }

    if (isset($user->social)) {
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
                                           foreach ($user->social as $link): ?>
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
        <button type="button"  onclick="closeEditProfileModal();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/smartist/public/user/edit" method="post">
              <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>"placeholder="name@example.com">
  </div>

                <div class="form-group">
    <label for="location">Location</label>
    <input type="location" class="form-control" id="location" name="location" value="<?= $user->location ?>" placeholder="name@example.com">
  </div>

                <div class="form-group">
    <label for="website">Website</label>
    <input type="website" class="form-control" id="website" name="website" value="<?= $user->website ?>"placeholder="name@example.com">
  </div>

                <div class="form-group">
    <label for="tel">Telephone</label>
    <input type="tel" class="form-control" id="tel" name="tel" value="<?= $user->tel ?>" placeholder="name@example.com">
  </div>

<!--                 <div class="form-group">
    <label for="social">Social Media</label>
    <input type="social" class="form-control" id="social" name="social" value="<?= $user->social[0] ?>"placeholder="name@example.com">
  </div> -->

  <div class="form-group">
    <label for="bio">Bio</label>
    <textarea class="form-control" id="bio" name="bio" rows="3"><?= $user->bio ?></textarea>
  </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeEditProfileModal();" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitEditProfileForm();"class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" onclick="closeUploadModal();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="./upload/">

              <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Product Name">
  </div>
                    <div class="custom-file">
          <input type="file" class="custom-file-input" name="fileUpload"  id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
      
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"onclick="closeUploadModal();" data-dismiss="modal">Close</button>

        <button type="button" onclick="submitUploadForm();" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
</body>
<script type="text/javascript" src="<?=PUBLIC_URL?>/js/main.js"></script>
</html>
