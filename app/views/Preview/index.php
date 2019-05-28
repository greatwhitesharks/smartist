
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/preview.css">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class='col-6 col-lg-4 text-center'>
				
		<h4><?= $data['title']?></h4>
				<h6>by</h6>
				<h6><?= $data['author'] ?></h6>

				<?php if($data['type'] == 'lyric'){ ?>
				<div class="preview col" style="<?= ($data['status'] !== 'hidden') ? 'overflow:auto;' : 'height:400px;'   ?>">

					<p><?= $data['content'] ?></p>
					<?php if($data['status'] == 'hidden') {?>
					<div class="cover"></div>

						
					<div class="notice">
						
						<p class="h6">The author has hidden the full content. This is
							only a preview.</p>
						<button onclick="alert('TODO: This should send a message to owner');" class="btn btn-success">Request Permission</button>
					</div>
					<?php } ?>
				</div>


				<?php
			}else if($data['type'] == 'audio'){ ?>

				<div class="preview-audio col">
					<audio controls="controls"">
						<source src="//<?=$data['url']?>" type="audio/mpeg">
						
						Your browser does not support the HTML5 Audio element.
					</audio>
				</div>

				<?php } ?>
			</div>


		</div>
	
	<div class="row justify-content-center pt-5">
	<div class="col-6 col-lg-4 text-center">
		<div class="row">
			<div class="col">
				<h4>Comments</h4>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<form action="#" method="post">
				<div class="form-group">
					<textarea class="form-control"></textarea>
					</div>
<div class="form-group justify-content-end">
			<button class="btn btn-primary">Post</button>
			</div>
				</form>
			</div>
		</div>
		
<div class="row flex-column text-left">
			<div class="row">
			<div class="col-1">
				pic
			</div>
		
			
			<div class="col">
				<h6>Name</h6>
			</div>
</div>
<div class="row">
	<div class="col  p-3">
		Comment
	</div>
</div>
<div class="form-row align-items-right">
<div class="col-auto">
<a href="#">Edit</a>
</div>

<div class="col-auto">
<a href="#">Delete</a>

</div>

</div>

</div>
	</div>	
	</div>

	</div>
</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>



