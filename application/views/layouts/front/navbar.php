<body>
<nav class="navbar navbar-expand-lg navbar-light bg-gradient-primary">
	<div class="container">
		<a class="navbar-brand" >
			<img style="max-width:40px;" src="<?= base_url('assets/img')?>/logo.png">
			<a class="text-white"><b>SIDOKAR</b></a>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?php if($title == 'Beranda') echo "active"; ?>">
				<a class="nav-link" href="<?= base_url('front/beranda') ?>"style="color:white;">Beranda</a>
				</li>
				<li class="nav-item <?php if($title == 'Struktur Organisasi') echo "active"; ?>">
				<a class="nav-link" href="<?= base_url('front/struktur_o') ?>"style="color:white;">Struktur Organisasi</a>
				</li>
				<li class="nav-item <?php if($title == 'Agenda') echo "active"; ?>">
				<a class="nav-link" href="<?= base_url('front/agenda') ?>"style="color:white;">Agenda</a>
				</li>
				<li class="nav-item <?php if($title == 'Berita') echo "active"; ?>">
				<a class="nav-link" href="<?= base_url('front/berita') ?>"style="color:white;">Berita</a>
				</li>	
				
				<li class="nav-item <?php if($title == 'Login') echo "active"; ?>">
				<a class="btn btn-warning" href="<?= base_url('auth/login') ?>" style="color:white;">LOGIN </a>
				</li>
			</ul>
		</div>
	</div>
</nav>