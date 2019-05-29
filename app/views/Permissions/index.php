<div class="container-fluid">

<div class="row justify-content-center mt-3">
    <div class="col-8 justify-content-center">
    <div class="card">
      <div class="card-header">
      <h6><strong>Grant View Permission</strong></h6>
</div>
<div class="card-body">
    <form class="form-inline" action="<?= PUBLIC_URL?>/permissions/grant" method="post">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Recipient Username</label>
  <input required type="text" name="user" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

  <label class="sr-only" for="inlineFormInputGroupUsername2">Recipient</label>
  <div class="input-group mb-2 mr-sm-2">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Product</label>
  <input  type="text" required name="product" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">


  </div>


  <button type="submit" class="btn btn-primary mb-2 btn-extend">Grant</button>
</form>
<h6>The permissions will automatically expire after an hour</h6>
</div>
    </div>
    </div>
</div>

<!-- <div class="row justify-content-center mt-3">
    <div class="col-8 justify-content-center">
    <div class="card">
      <div class="card-header">
    <h6><strong>Granted View Permissions</strong></h6>
</div>
<div class="card-body">
<table class="table table-striped">
    <thead>
    <th>Recipient</th>
    <th>Product</th>
    <th>Action</th>
    </thead>
    <tbody>
      
    <?php 
    // if($data['permissions']):
    // foreach($data['permissions'] as $permussion):?>
      <tr>
        <td><?php //echo $permussion->getRecipient();?></td>
        <td><?php // echo$permussion->getProduct()->getTitle();?></td>
        <td><button onclick="revoke(<?php //echo $permussion->getId();?>)">Revoke</button></td>
      <tr>
    <?php// endforeach;
    //endif;?> 

    </tbody>

</table>
</div>
    </div> -->
    </div>
</div>

</div>
