
<link rel="stylesheet" href="../public/css/body.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
if (isset($_SESSION['account_id'])){

 ?>

  <div class="container-fluid mask rgba-gradient">
 
<div class="row">
    <div class="col-6 card "> 
    <br>
        <ul class="form-horizontal"  id="formdet">
           
        <label class="badge badge-secondary labSize"> Reciever Id:</label><input type="text" placeholder="ex:@####" id="id" class="form-control"><br>
        <label class="badge badge-secondary labSize"> Subject:</label><input type="text" placeholder="ex:####" id="subject" class="form-control"  maxlength="75"><br>
        <label class="badge badge-secondary labSize">  Message:</label><textarea type="text"placeholder="ex:####" id="message" class="form-control "id="text-box"></textarea><br><br>
            <button id="btn-submit" class="btn btn-outline-primary btnCol" type="submit">Send Message</button>
            
    
    </div>
    <div class="scrollbar scrollbar-lady-lips col">
    <div class="force-overflow ">
    <br>
       <ul id="message-list"></ul>
        </div >
        </div >
        </div >
        
</div>

<script src="../public/js/Ajax.js"></script>
<script src="../public/js/messageJs.js"></script>
<script src="../public/js/del.js"></script>
    </body>
</html>
        <?php 
      } ?>
