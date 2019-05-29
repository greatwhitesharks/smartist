<div class="container-fluid">

<div class="row justify-content-center mt-3">
    <div class="col-8 justify-content-center">
    <div class="card">
      <div class="card-header">
      <h6><strong>Grant View Permission</strong></h6>
</div>
<div class="card-body">
    <form class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Recipient Username</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

  <label class="sr-only" for="inlineFormInputGroupUsername2">Recipient</label>
  <div class="input-group mb-2 mr-sm-2">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Product</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  </div>


  <button type="submit" class="btn btn-primary mb-2 btn-extend">Grant</button>
</form>
</div>
    </div>
    </div>
</div>

<div class="row justify-content-center mt-3">
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
    if($data['permissions']):
    foreach($data['permissions'] as $permussion):?>
      <tr>
        <td><?=$permussion->getRecipient()?></td>
        <td><?=$permussion->getProduct()->getTitle()?></td>
        <td><button onclick="revoke(<?=$permussion->getId()?>)">Revoke</button></td>
      <tr>
    <?php endforeach;
    endif;?> 

    </tbody>

</table>
</div>
    </div>
    </div>
</div>

</div>
