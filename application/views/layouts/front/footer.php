<div class="jumbotron footer m-0 bg-gradient-primary">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
				<img style="width: 100px; " src="<?= base_url('assets/img')?>/logo.png" alt="logo">
				<p class="mt-3"style="color:white;">Alamat : Jl. Purnawarman Barat No.6, Sindangkasih, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41112 </p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<h5 style="background-color: rgba(255, 204, 41, 1);color:black;">Tentang Kami</h5>
				<ul>
					<a style="color:white;" href="<?= base_url('front/struktur_o') ?>"><li>Struktur Organisasi</li></a>
					<a style="color:white;" href="<?= base_url('front/agenda') ?>"><li>Agenda</li></a>
					<a style="color:white;" href="<?= base_url('front/berita') ?>"><li>Berita</li></a>
				</ul>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
				<h5 style="background-color: rgba(255, 204, 41, 1);color:black;">Kontak Kami</h5>
				<p style="color:white;">Telp : +62264201681</p>
			</div>
		</div>
		<hr>
		<p class="text-center p-0" style="color:white;">
			Copyright 2023
			
		</p>
	</div>
</div>
<script src="<?= base_url('assets/adminlte')?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/adminlte/') . 'plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte/') . 'plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/') . 'dist/js/adminlte.min.js' ?>"></script>	

	<?php
    if ($this->session->flashdata('success')) { ?>
        <script>
            var successMessage = <?php echo json_encode($this->session->flashdata('success')); ?>;
            $(document).ready(function() {
                Swal.fire("Good Job!", successMessage, "success");
            });
        </script>
    <?php } else if ($this->session->flashdata('error')) { ?>
        <script>
            var errorMessage = <?php echo json_encode($this->session->flashdata('error')); ?>;
            $(document).ready(function() {

                Swal.fire("Oops!", errorMessage, "error");
            });
        </script>
    <?php } ?>
</body>
</html>

