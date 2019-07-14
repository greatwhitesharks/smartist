
<?php
if (isset($_SESSION[ACCOUNT_IDENTIFIER])){

 ?>
</div class='container'>
<div class='row'>
    <div class="col-4  left ">
    
    

<span class="badge badge-secondary ">Follower List</span>
    <br>  <br>
    <div class="scrollbar scrollbar-lady-lips ">
     
     <div class="force-overflow ">
<ul id="observerList">

</ul>

</div>
</div>
</div>
<div class="col-8 " >
  <div class="row right rounded border border-primary  ">
    <div class="col">
  <p>SELECT ANY FOLLOWER TO CHAT.</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
          <cite title="Source Title">Smartist group</cite>
        </small>
      </footer>
    </blockquote>
    </div>
  </div>
  <div class="row">
    <div class="col">
  <div id="followerbox">
  </div>
  </div>
  </div>
  <div class="row">
    <div class='col'>
    <div class='scrollbar scrollbar-lady-lips' >
    <div class="force-overflow chatbox rounded-right border border-primary ">
       <ul id="chat">
       </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="row">
      <div class='col'>
    <div  class=" input rounded border border-primary bg-secondary">
      <input type="text" class="form-control">
      <button type="button" class="btn btn-outline-primary">Send</button>
    </div>
    </div>
    </div>
</div>
</div>
</div>
</body>

<script src="../public/js/observer.js"></script>

<link rel="stylesheet" href="../public/css/observer.css">
</html>
<?php } ?>