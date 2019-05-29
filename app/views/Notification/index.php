

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-6">
    <div class="mt-5 row justify-content-center">
<h5 class="text-center">Notifications</h5>
</div>

<div class="row">
    <div class="col">
<div class="card mt-5">
<h5 class="text-center">Permission Requests</h5>
<?php foreach($data['notification'] as $notification):?>
<div class="row ">

<div class="col">
<p class="text-center" ><?= $notification->getMessage()?></p>
        <form>

</form>
</div>
    </div>
</div>

<?php endforeach;?>
    </div>
</div>

</div>

</div>
</div>