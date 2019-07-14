
<div class="row mt-5" style="height:60px;overflow-x:hidden;">
	<div class="col">
<form class="form-inline" action="<?= PUBLIC_URL ?>/search/" method="POST">
<!-- <div class="form-group ">
    <h3>Search   :<input type="text" class="form-control" placeholder="Name" name="key" value="">
    <button type="submit" name="submit"><img src="/images/search.png" class="img-responsive" width =50px height="50px"></button> </h3> 
</div> -->
<div class="search-box" id="searchForm">
  <input type="text" placeholder="Search for articles and users..." class="search-txt" name="key" value="<?= urldecode($key)?>" >
  <!-- <button type="submit" name="submit" id="submit"><a class= "search-btn" href="#">
  <i  class="fas fa-search"></i></a></button> -->


  <button type="submit" name="submit" id="submit" class= "search-btn" href="#">
  <i  class="fas fa-search"></i></button>
</div>
</form>
</div>



</div>


	

