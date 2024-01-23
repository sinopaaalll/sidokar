<div class="card">
        <div class="card-header">
            <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Bidang
            </button>
            </div>
        
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="bidang1" class="table table-bordered "  width="100%">
                <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th width="40%">Nama Bidang</th>
                    <th width="30%">Keterangan</th>
                    <th width="16%"><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($bidang as $bdg) : ?>
                
                <tr>
                    <td><center><?= $no++ ?></center></td>
                    <td><?= $bdg->nama_bidang ?></td>
                    <td><?= $bdg->keterangan ?></td>
                    <td>
                        <center>
                        <button class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalEdit<?= $bdg->id ?>"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('admin/bidang/hapus/'.$bdg->id); ?>" class="btn btn-danger btn-sm mb-1 btn-hapus"><i class="fas fa-trash"></i></a>
                        </center>
                    </td>
                </tr>
                
                
                <?php endforeach ?>
                </tbody>
                </table>
            </div>
</div>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Tambah Bidang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/bidang/tambah'); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3  col-form-label">Nama Bidang<sup class="text-red">*</sup></label>
						<div class="col-sm-8 mt-1">
							<input type="text" class="form-control" name="nama_bidang" id="nama_bidang" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_bidang" id="keterangan_bidang"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="offset-3 col-sm-6">
							<button type="submit" class="btn btn-primary btn_save">Simpan</button>
						</div>
					</div>
                    <div class="form-group row">
						<div class="offset-3 col-sm-6">
                        <a class="text-red">*</a> <a style="font-size: 13px;">= <b>&nbsp;Tidak Boleh Kosong</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php foreach($bidang as $bdg) { ?>
<div class="modal fade" id="modalEdit<?= $bdg->id ?>">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Bidang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/bidang/edit/'.$bdg->id); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3  col-form-label">Nama Bidang<sup class="text-red">*</sup></label>
						<div class="col-sm-8 mt-1">
							<input type="text" class="form-control" name="nama_bidang" id="nama_bidang" value="<?= $bdg->nama_bidang ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_bidang" id="keterangan_bidang" value="<?= $bdg->keterangan ?>"><?= $bdg->keterangan ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="offset-3 col-sm-6">
							<button type="submit" class="btn btn-primary btn_save">Simpan</button>
						</div>
					</div>
                    <div class="form-group row">
						<div class="offset-3 col-sm-6">
                        <a class="text-red">*</a> <a style="font-size: 13px;">= <b>&nbsp;Tidak Boleh Kosong</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        // Menghentikan tautan dari navigasi langsung
        $('.btn-hapus').on('click', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');

            // Menampilkan dialog konfirmasi SweetAlert
            Swal.fire({
                title: "Yakin, data akan dihapus?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi logout, arahkan ke URL logout
                    window.location.href = href;
                }
            });
        });

    });
</script>


<?php
if ($this->session->flashdata('success')) { ?>
    <script>
        var successMessage = <?php echo json_encode($this->session->flashdata('success')); ?>;
        $(document).ready(function() {
            Swal.fire("Berhasil!", successMessage, "success");
        });
    </script>
<?php } else if ($this->session->flashdata('warning')) { ?>
    <script>
        var warningMessage = <?php echo json_encode($this->session->flashdata('warning')); ?>;
        $(document).ready(function() {

            Swal.fire("Oops!", warningMessage, "warning");
        });
    </script>
<?php } ?>