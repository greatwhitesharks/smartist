<!doctype html>
<html lang="en">
  <head>
    <title>Smartist - <?= $title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?=PUBLIC_URL?>/css/styles.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>/css/bootstrap.min.css" crossorigin="anonymous"> 
    <?php 
$file = VIEW_PATH . explode('/',$view)[0] . '/styles.php';
if(file_exists($file)){
   include($file);
}
?>
</head>
  <body>
        <nav class="navbar navbar-expand-lg flex-column flex-lg-row purple">
    
                <button id="menu-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hiddenNav" aria-controls="hiddenNav" aria-expanded="false" aria-label="Toggle navigation">
                   <i class="material-icons">
           menu
             </i>
             </button>
               <a class="nav-bar-brand mr-0 mr-md-2 logo"></a>
               <div class="collapse navbar-collapse" id="hiddenNav" >
                 <ul class="navbar-nav " >
                   <li class="nav-item active">
                     <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#">Search</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#">Contact</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                   </li>
                 </ul>
               </div>
        
             
             <?php if (!isset($_SESSION[ACCOUNT_IDENTIFIER])) {
    ?>
               <ul class="navbar-nav horizontal ml-lg-2 d-flex flex-row justify-content-around mt-4 mt-lg-0">
                 <li class="nav-item  mx-3 mx-sm-4 d-flex ">
                <button type="button" class="btn btn-light">Login</button>   
                </li>
                <li class="nav-item  mx-3 mx-sm-4 d-flex">
                                <button type="button" class="btn btn-light">Register</button>    
                                </li>
               </ul>
               <?php
} else {
        ?>
                 <a class="nav-link profile-pic ml-md-auto d-none d-lg-flex" href="#">
             
              
                     
                      </a>
               <ul class="navbar-nav horizontal ml-lg-2 d-flex flex-row justify-content-around mt-4 mt-lg-0">
                 <li class="nav-item  mx-3 mx-sm-4 d-flex d-lg-none">
                   <a class="nav-link" href="#"><i class="material-icons">
           account_circle
           </i></a>
                 </li>
                              <li class="nav-item   mx-3 mx-sm-4 mx-lg-1">
                   <a class="nav-link" href="#"><i class="material-icons">
           message
           </i></a>
                 </li>
                 <li class="nav-item  mx-3 mx-sm-4 mx-lg-1">
                   <a class="nav-link" href="#"><i class="material-icons">
           public
           </i></a>
                 </li>
                 <li class="nav-item mx-3 mx-sm-4 mx-lg-1">
                   <a class="nav-link" href="#"><i class="material-icons">
           settings
           </i></a>
                 </li>

                   <li class="nav-item  mx-3  mx-sm-4 mx-lg-1">
                     <a class="nav-link">
                     <form action="<?= PUBLIC_URL?>/logout" method='POST'>
                   <button class="" style="background-color:transparent; border:none;color:#bea9df;cursor:pointer;" class="nav-link" href="./logout"><i class="material-icons">
           exit_to_app
           </i>
          </button>
</form></a>
                 </li>
               </ul>

    

               <?php
    } ?>
           
             </nav>