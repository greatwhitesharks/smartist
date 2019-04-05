
<!doctype html>
<html lang="en">
  <head>
    <title>Inbox</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../public/css/nav.css">
<link rel="stylesheet" href="../public/css/body.css">
<script  src="../public/js/Ajax.js"></script>
<script  src="../public/js/right.js"></script>

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
    <a class="nav-link profile-pic ml-md-auto d-none d-lg-flex" href="#">     
           </a>
    <ul class="navbar-nav horizontal ml-lg-2 d-flex flex-row justify-content-around mt-4 mt-lg-0">
      <li class="nav-item  mx-3 mx-sm-4 d-flex d-lg-none">
        <a class="nav-link" href="#"><i class="material-icons">
account_circle
</i></a>
      </li>
      <li class="nav-item  mx-3  mx-sm-4 mx-lg-1">
        <a class="nav-link" href="#"><i class="material-icons">
note_add
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
    </ul>

  </nav>
<br>
  <div class="container-fluid">
 
<div class="row">
    <div class="col-6"> 
        <form class="form-horizontal"  action="http://localhost/MVC/public/inbox/sendMessage" method="post">
        <label class="badge badge-secondary labSize"> Reciever Id:</label><input type="text" placeholder="ex:@####" name="id" class="form-control"><br>
        <label class="badge badge-secondary labSize"> Subject:</label><input type="text" placeholder="ex:####" name="subject" class="form-control"  maxlength="75"><br>
        <label class="badge badge-secondary labSize">  Message:</label><textarea type="text"placeholder="ex:####" name="message" class="form-control "id="text-box"></textarea><br><br>
            <input  class="btn btn-outline-primary btnCol" type="submit">
        </form>
        <br>
    
    </div>
    <div class="col scrollbar scrollbar-lady-lips">
    <div class="force-overflow col">
       <ul id="message-list"></ul>
        </div >
</div>
    
    </body>
</html>

