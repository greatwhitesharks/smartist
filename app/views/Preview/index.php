
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/preview.css">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class='col-lg-4 text-center'>
				<h4><?= $data['title']?></h4>
				<h6>by</h6>
				<h6><?= $data['author'] ?></h6>


				<?php if($data['type'] == 'lyric'){ ?>
				<div class="preview col" <?= ($data['status'] !== 'hidden') ? 'style="overflow:auto	";' : ""   ?>>

					<p><?= $data['content'] ?></p>
					<?php if($data['status'] == 'hidden') {?>
					<div class="cover"></div>


					<div class="notice">
						<p class="h6">The author has hidden the full content. This is
							only a preview.</p>
						<button class="btn btn-success">Request Permission</button>
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



