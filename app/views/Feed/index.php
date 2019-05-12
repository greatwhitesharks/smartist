<?php

//$products = $data['products'];
?>
  
  
  
  <style type="text/css">
    



.purple{
  background-color:#563d7c;

}
.purple a, .purple button{
  color:#bea9df;
  text-align:center;
}
.purple a:hover{
  color:white;
}
.purple button:hover{
  color:white;
  
}

.logo{
  background-color:white;
  width:36px; height:36px;
}

.profile-pic{
  width:36px;
   height:36px;
  background-color:white;
  border-radius:36px;
  
}

#menu-button{
  position:absolute;
  box-sizing:border-box;
  right:10px;
}

.container-fluid{

}



* {
  box-sizing: border-box;
}
p {
  margin: 0;
}

a {
  color: #6f5499;
}
a:hover {
  color: #7c6c94;
}

body {
  background-color: #6f5499;
    background-color:#6f5499; 
  color: black;
}

.container-fluid{
  background-color:#6f5499;
}

div {
  background-clip: padding-box;
}
.feed {
  
  padding: 10px;
  background-color: #fff;
  border-radius: 5px;
  min-width: 320px;
}

.left {
  

  text-align: center;
  background-color: #fff;
  border-radius: 5px;
  min-width: 250px;
  padding: 10px;

}
.left .bio {
  width: 80%;
}
.right {
  text-align: center;
  padding: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #fff;
  border-radius: 5px;
  height: 140px;
    min-width: 260px;
}
.right a {
  margin-left: 10px;
}

.post {
  background-color: #333;
}

.post .comments {
}

.poster-info {
  display: flex;
  height: 50px;
  background-color: #ccc;
}

.poster-info * {
  display: inline-block;
  box-sizing: border-box;
  align-self: center;
}

.commenter-pic,
.poster-pic {
  min-width: 40px;
  height: 40px;
  background-color: white;
  margin: 5px;
}

.poster-name,
.commenter-name {
  cursor: pointer;
  width: 100px;
  height: 40px;
  font-weight: bold;
}
.left * {
  margin-top: 5px;
}

.post-content {
  min-height: 80px;
  background-color: #fff;
  border-left: 1px solid #ccc;
  border-right: 1px solid #ccc;
  padding: 10px;
}

.comment {
  display: flex;
  padding: 5px;
  background-color: #ccc;
}

.comment .comment-text {
  max-width: 100%;
}

.post-form {
}

.left .main-profile-pic {
  width: 100px;
  height: 100px;
  background-color: gray;
  border-radius: 100px;
}

  </style>
  
  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="left mb-3 mb-lg-0 mt-3 col-lg-3 col-sm-12">
        <div class="row justify-content-center">
          <div class="col-sm-12">
            <img class="main-profile-pic" src="<?= $data['profilePic']?>">
            <h5><?= $data['displayName']?></h5>
          </div>
        </div>
        <div class="row  justify-content-center">
          <div class="col-sm-12 bio justify-content-center"><?= $data['bio']?></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg">
            <ul class="list-group list-group-horizontal justify-content-around flex-sm-row flex-lg-column">
              <li class="list-group-item flex-fill  d-flex justify-content-between align-items-center">
                Followers
                <span class="badge badge-primary badge-pill" id="followers"><?= $data['followers'] ?></span>
              </li>
              <li class="list-group-item d-flex flex-fill justify-content-between align-items-center">
                Following
                <span class="badge badge-primary badge-pill" id="following"><?= $data['following'] ?></span>
              </li>
        <!--                  <li class="list-group-item flex-fill d-flex justify-content-between align-items-center">
                Uploads
                <span class="badge badge-primary badge-pill">0</span>
              </li> -->

            </ul>
          </div>
        </div>

      </div>
      <div class="feed mb-3 mb-lg-0 mt-lg-3 col-sm-12 col-lg-5">
        <h5>Followed Products</h5>
        <div class="feed-content">

        <ul id="feed-list" style="list-style-type:none;" class="list">

        </ul>
<?php

           // foreach ($products as $product):
 
                                ?>
                       <!--      <div class="product col mt-3 mt-sm-0 mb-3 flex-row">
                                <div class="row justify-content-end">
                                    <div class="col">
                                            <img height="200" src="http://localhost/smartist/public/images/product.svg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            
                                    </div>
                                
      
                                </div>
                                <div class="row justify-content-center">
                                    <h6><?= $product->product_title ?></h6>
                                </div>

                                <div class="row justify-content-center pb-3">

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
                                    </div>
                                                     </div> -->
                                    
                                                      <?php //endforeach;?>

                                                    </div>
      <!--   <form class="post-form">
          <h4>Post something...</h4>
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-dark">
         Post
         </button>
            <button class="btn btn-dark">
         Add attachment
         </button>
          </div>
        </form>
        <article class="post">
          <div class="poster-info">
            <div class="poster-pic">

            </div>
            <a class="poster-name">Mr. EFG</a>
          </div>
          <div class="post-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a justo eget eros egestas vulputate.</p>
          </div>

          <div class="comments">
            <div class="comment">
              <div class="commenter-pic" src=""> </div>
              <div class="comment-content"> <a class="commenter-name">Mr. ABC</a>
                <div class="comment-text"> Lorem ipsum dolor sit ametLorem ipsum dolor sitLorem ipsum dolor sit </div>
              </div>

            </div>
          </div>

          <div class="add comment">
            <input type="text" class="form-control" placeholder="Enter comment">
          </div>
        </article> -->
      </div>

      <div class="right col-sm-12 mt-lg-3 col-lg-2">
        <div class="bottom-links"><a href="#">About</a>
          <a href="#">Feedback</a>
          <a href="#">Terms</a>
          <hr/>
          <div class="copyright">
            <p> Copyright 2019.</p>
            <p> Some rights reserved.</p>
          </div>
        </div>
      </div>
    </div>

</body>
  
  

   <!--  <script  src="js/main.js"></script> -->
    <script type="text/javascript">
      // // TODO : Improve browser compatibility
      (function(){


      var xhr = new XMLHttpRequest();
 
      var feed = document.getElementsByClassName('feed-content')[0];

      xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
          let data = JSON.parse(xhr.responseText);
          var ul = document.getElementById('feed-list');
          ul.innerHTML = '';
          for(obj of data){
            var html =  `
            <h6> Posted by ${obj.author} </h6>
            <div class="product col mt-3 mt-sm-0 mb-3 flex-row">
                      
                                <div class="row justify-content-end">
                                    <div class="col">
                                    
                                            <img height="200" src="http://localhost/smartist/public/images/product.svg" class="img-fluid" alt="">
                            
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <h6>${obj.product_title}</h6>
                                </div>
       </div> `;

        var li = document.createElement('li');
        li.innerHTML = html;
        ul.appendChild(li);

          }
          feed.innerHTML = '';
          feed.appendChild(ul);
        }
      };



      function checkForNewPosts(){
      xhr.open('GET', 'http://localhost/smartist/public/feed/feed', true);
      xhr.send();
     
      }


      checkForNewPosts();

      setInterval(checkForNewPosts, 1000 * 30);

      })();
    </script>


