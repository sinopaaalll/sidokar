<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner" style="height: 850px;">
		<?php $no = 0;?>
		<?php foreach($slider as $slide) : ?>
			<?php $no++;  ?>
			<div class="carousel-item <?php if($no <= 1) { echo "active"; } ?>">
			
				<img src="<?= base_url("uploads/$slide->gambar") ?>" class="d-block w-100">
			
				
			</div>
		<?php endforeach ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="sambutan mt-5 mb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<h2>Sambutan</h2>
				<hr>
				<p class="text-center">Selamat datang! Temukan informasi yang kamu butuhkan di website ini.</p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-5 text-center">
				<img src="<?= base_url("assets/img/notfound.png") ?>" class="img-thumbnail img-fluid">
			</div>
		</div>
	</div>
</div>

<div class="jumbotron jumbotron-fluid bg-cover jurusan mt-3" style="background-image: url(<?= base_url('assets/img/image1.png') ?>);">
	<div class="container text-center">
		<div class="row">
			<div class="col">
			</div>
		</div>
		
		</div>
	</div>
</div>

<div class="last-news mt-5 mb-5">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col">
				<h2 class="text-center">Berita Terbaru</h2>
				<hr>
			</div>
		</div>
		<div class="row mt-4">
			<?php foreach($berita as $b) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="card" style="width: 15rem; height: 24rem;">
						<img style="height:150px" src="<?= base_url('uploads/' . $b->gambar) ?>" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title"><?= $b->judul ?></h5>
							<p class="card-text"><?= character_limiter(html_entity_decode($b->isi),50) ?></p>
							<a href="" class="btn btn-info btn-sm">Lanjut Membaca<i class="fa fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="row mt-4">
			<div class="col text-center">
				<a href="" class="btn btn-secondary text-light">Lihat Selengkapnya<i class="fa fa-angle-double-right ml-2"></i></a>
			</div>
		</div>
	</div>
</div>