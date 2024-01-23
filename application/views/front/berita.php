<!--================Home Banner Area =================-->
<div class="jumbotron banner_area jumbotron-fluid" style="background-image: url(<?= base_url('assets/img/image1.png') ?>); ">
	<div class="container">
		<h1 class="display-4 my-auto text-warning text-center">Berita</h1>
	</div>
</div>
<!--================End Home Banner Area =================-->

<!-- Berita -->
<div class="last-news mt-5">
	<div class="container">
		<div class="row mt-4">
			<?php foreach($berita as $b) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 my-3">
					<div class="card" style="width: 15rem; height: 24rem;">
						<img style="height:150px" src="<?= base_url('uploads/' . $b->gambar) ?>" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title"><?= $b->judul ?></h5>
							<p class="card-text"><?= character_limiter(html_entity_decode($b->isi),50) ?></p>
							<a href="<?= base_url("/front/berita/baca/$b->seo_judul") ?>" class="btn btn-info btn-sm">Lanjut Membaca<i class="fa fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<!-- Pagination -->
		<div class="row mt-5 pb-5">
			<div class="col">
				<nav aria-label="Page navigation example">
					<?= $pagination ?>
				</nav>
			</div> 
		</div>
		<!-- End of Pagination -->

	</div>
</div>
<!-- End of Berita -->
