<script src="../public/js/Ajax.js"></script>
<script src="../public/js/messageDropDown.js"></script>
<link rel="stylesheet" href="../public/css/body.css">
<?php
if (isset($_SESSION['account_id'])){

 ?>

  <div class="container-fluid">
 
<div class="row">
    <div class="col-6"> 
        <form class="form-horizontal"  action="http://localhost/smartist/public/inbox/sendMessage" method="post">
            <br>
        <label class="badge badge-secondary labSize"> Reciever Id:</label><input type="text" placeholder="ex:@####" name="id" class="form-control"><br>
        <label class="badge badge-secondary labSize"> Subject:</label><input type="text" placeholder="ex:####" name="subject" class="form-control"  maxlength="75"><br>
        <label class="badge badge-secondary labSize">  Message:</label><textarea type="text"placeholder="ex:####" name="message" class="form-control "id="text-box"></textarea><br><br>
            <input  class="btn btn-outline-primary btnCol" type="submit">
        </form>
        <br>
    
    </div>
    <div class="col scrollbar scrollbar-lady-lips">
    <div class="force-overflow col">
    <br>
       <ul id="message-list"></ul>
        </div >
</div>
    
    </body>
</html>
        <?php 
      } ?>
