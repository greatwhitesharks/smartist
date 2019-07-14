<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css2">

    <link rel="stylesheet" href="css2/bootstrap.min.css2">
    <link rel="stylesheet" href="css2/magnific-popup.css2">
    <link rel="stylesheet" href="css2/jquery-ui.css2">
    <link rel="stylesheet" href="css2/owl.carousel.min.css2">
    <link rel="stylesheet" href="css2/owl.theme.default.min.css2">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css2">


    <link rel="stylesheet" href="css2/aos.css2">

    <style>

      /* Base */
body {
  line-height: 1.7;
  color: #4d4d4d;
  font-weight: 200;
  font-size: 1.1rem; }

::-moz-selection {
  background: #000;
  color: #fff; }

::selection {
  background: #000;
  color: rgb(245, 185, 247); }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a:hover {
    text-decoration: none; }

.text-black {
  color: #000 !important; }

.bg-black {
  background: #000 !important; }

.site-wrap:before {
  -webkit-transition: .3s all ease-in-out;
  -o-transition: .3s all ease-in-out;
  transition: .3s all ease-in-out;
  background: rgba(0, 0, 0, 0.6);
  content: "";
  position: absolute;
  z-index: 2000;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
  visibility: hidden; }

.offcanvas-menu .site-wrap {
  position: absolute;
  height: 100%;
  width: 100%;
  z-index: 2;
  overflow: hidden; }
  .offcanvas-menu .site-wrap:before {
    opacity: 1;
    visibility: visible; }

.btn {
  text-transform: uppercase;
  position: relative;
  -webkit-transition: 0.2s all ease-in-out !important;
  -o-transition: 0.2s all ease-in-out !important;
  transition: 0.2s all ease-in-out !important;
  top: 0;
  letter-spacing: .05em; }
  .btn:hover, .btn:active, .btn:focus {
    outline: none;
    -webkit-box-shadow: none !important;
    box-shadow: none !important; }
  .btn.btn-secondary {
    background-color: #e6e7e9;
    border-color: #e6e7e9;
    color: #000; }
  .btn.btn-sm {
    font-size: 0.9rem; }
  .btn.btn-primary {
    font-weight: 300;
    letter-spacing: .2em; }
  .btn:hover {
    -webkit-box-shadow: 0 5px 20px -7px rgba(0, 0, 0, 0.9) !important;
    box-shadow: 0 5px 20px -7px rgba(0, 0, 0, 0.9) !important;
    top: -2px; }

.bg-black {
  background: #000; }

.form-control {
  height: 43px; }
  .form-control:active, .form-control:focus {
    border-color: #f23a2e; }
  .form-control:hover, .form-control:active, .form-control:focus {
    -webkit-box-shadow: none !important;
    box-shadow: none !important; }

.site-section {
  padding: 5em 0; }
  @media (min-width: 768px) {
    .site-section {
      padding: 5em 0; } }
  .site-section.site-section-sm {
    padding: 4em 0; }

.site-section-heading {
  font-size: 30px;
  color: #25262a;
  position: relative; }
  .site-section-heading:before {
    content: "";
    left: 0%;
    top: 0;
    position: absolute;
    width: 40px;
    height: 2px;
    background: #f23a2e; }
  .site-section-heading.text-center:before {
    content: "";
    left: 50%;
    top: 0;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    position: absolute;
    width: 40px;
    height: 2px;
    background: #f23a2e; }

.border-top {
  border-top: 1px solid #edf0f5 !important; }

.site-footer {
  padding: 4em 0;
  background: #333333; }
  .site-footer p {
    color: #737373; }
  .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5 {
    color: #fff; }
  .site-footer a {
    color: #999999; }
    .site-footer a:hover {
      color: white; }
  .site-footer ul li {
    margin-bottom: 10px; }
  .site-footer .footer-heading {
    font-size: 20px;
    color: #fff; }

.bg-text-line {
  display: inline;
  background: #000;
  -webkit-box-shadow: 20px 0 0 #000, -20px 0 0 #000;
  box-shadow: 20px 0 0 #000, -20px 0 0 #000; }

.text-white-opacity-05 {
  color: rgba(255, 255, 255, 0.5); }

.text-black-opacity-05 {
  color: rgba(0, 0, 0, 0.5); }


/* Blocks */
.site-blocks-cover {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: top;
  background-position: center center; }
  .site-blocks-cover.overlay {
    position: relative; }
    .site-blocks-cover.overlay:before {
      position: absolute;
      content: "";
      left: 0;
      bottom: 0;
      right: 0;
      top: 0;
      background: rgba(0, 0, 0, 0.4); }
  .site-blocks-cover .player {
    position: absolute;
    bottom: -250px;
    width: 100%; }
  .site-blocks-cover, .site-blocks-cover .row {
    min-height: 600px;
    height: calc(100vh); }
  .site-blocks-cover.inner-page-cover, .site-blocks-cover.inner-page-cover .row {
    min-height: 600px;
    height: calc(30vh); }
  .site-blocks-cover h2, .site-blocks-cover h3, .site-blocks-cover h4, .site-blocks-cover h5 {
    color: #fff; }
  .site-blocks-cover h1 {
    font-size: 30px;
    font-weight: 900;
    color: #fff;
    line-height: 1.5; }
    @media (min-width: 768px) {
      .site-blocks-cover h1 {
        font-size: 50px; } }
  .site-blocks-cover p {
    color: #fff;
    font-size: 1.2rem;
    line-height: 1.5; }
  .site-blocks-cover .intro-text {
    font-size: 16px;
    line-height: 1.5; }

.bg-light {
  background: rgb(236, 156, 252); }

.team-member {
  position: relative;
  float: left;
  width: 100%;
  overflow: hidden; }
  .team-member img {
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1); }
  .team-member:before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(242, 58, 46, 0.8);
    z-index: 2;
    height: 100%;
    width: 100%;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease; }
  .team-member .text {
    top: 50%;
    text-align: center;
    position: absolute;
    padding: 20px;
    -webkit-transform: translateY(-30%);
    -ms-transform: translateY(-30%);
    transform: translateY(-30%);
    -webkit-transition: .5s all ease;
    -o-transition: .5s all ease;
    transition: .5s all ease;
    opacity: 0;
    visibility: hidden;
    color: rgb(231, 131, 231); }
  .team-member:hover:before, .team-member:focus:before, .team-member:active:before {
    opacity: 1;
    visibility: visible; }
  .team-member:hover img, .team-member:focus img, .team-member:active img {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1); }
  .team-member:hover .text, .team-member:focus .text, .team-member:active .text {
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    -webkit-transition-delay: .2s;
    -o-transition-delay: .2s;
    transition-delay: .2s;
    opacity: 1;
    visibility: visible;
    z-index: 4; }
</style>
  </head>
  <body>
  

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-2 display-4">About us</h2>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-md-6">
            <p class="lead"><b>Every great creation was once just a dream. We at Smartist, believe that you deserve to pursue your dreams beyond physical boundaries. We present to you Smartist, the place where all your musical dreams come true.</b></p>
          </div>
          <div class="col-md-6">
            <p>Smartist is an online platform for artists around the world to work in collaboration. A musical masterpiece often needs collaboration of different artists; be it singers, lyricists, music producers or anything else. With Smartist, the world's most talented musicians are just one click away from you. Form your dream team and create your dream product - the sky is the limit!
            </p>
            </div>
          <div class="col-md-12">
            <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid mb-5">
          </div>
        </div>
      </div>
    </div>



    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-5" data-aos="fade-up">
            <h2 class="display-4 mb-5 text-black">Developers</h2>
          </div>
          <div class="col-md-10 col-lg-5 text-center mb-5" data-aos="fade-up">
            <img src="images/person_1.gif" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
            <h2 class="text-black font-weight-light mb-4">Thamindu Rothmand</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
            <p>
              <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
            </p>
          </div>
          <div class="col-md-10 col-lg-5 text-center mb-5" data-aos="fade-up">
            <img src="images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
            <h2 class="text-black font-weight-light mb-4">Yasiru Janith</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
            <p>
              <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
            </p>
          </div>
          <div class="col-md-6 col-lg-5 text-center mb-5" data-aos="fade-up">
            <img src="images/person_3.png" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
            <h2 class="text-black font-weight-light mb-4">Gihan Ravindu</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
            <p>
              <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
            </p>
          </div>
          <div class="col-md-6 col-lg-5 text-center mb-5" data-aos="fade-up">
            <img src="images/person_4.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
            <h2 class="text-black font-weight-light mb-4">Vihanga Dewmini</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
            <p>
              <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>


  <script src="js2/jquery-3.3.1.min.js"></script>
  <script src="js2/jquery-migrate-3.0.1.min.js"></script>
  <script src="js2/jquery-ui.js"></script>
  <script src="js2/popper.min.js"></script>
  <script src="js2/bootstrap.min.js"></script>
  <script src="js2/owl.carousel.min.js"></script>
  <script src="js2/jquery.stellar.min.js"></script>
  <script src="js2/jquery.countdown.min.js"></script>
  <script src="js2/jquery.magnific-popup.min.js"></script>
  <script src="js2/aos.js"></script>

  <script src="js2/mediaelement-and-player.min.js"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>


  <script src="js2/main.js"></script>
    
  </body>
</html>