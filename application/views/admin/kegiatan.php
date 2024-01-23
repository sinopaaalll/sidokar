<div class="card">
        <div class="card-header">
            <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Kegiatan
            </button>
            </div>
        
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered "  width="100%">
                <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th width="40%">Nama Kegiatan</th>
                    
                    
                    <th width="12%">Tgl Kegiatan</th>
                    <th width="30%">Keterangan</th>
                    <th width="16%"><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($kegiatan as $kgt) : ?>
                
                <tr>
                    <td><center><?= $no++ ?></center></td>
                    <td><?= $kgt->nama_kegiatan ?><hr style="margin: 5px -2px;"><a style="font-size: 13px;">No. <?= $kgt->no_kegiatan ?></a></td>
            
                    
                    <td><center><?= $kgt->tgl_kegiatan ?></center></td>
                    <td><?= $kgt->keterangan ?></td>
                    <td>
                        <center>
                        <a href="<?= base_url('admin/berkas_berkas/index/'.$kgt->id_kegiatan) ?>" class="btn btn-secondary btn-sm mb-1"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalEdit<?= $kgt->id_kegiatan ?>"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('admin/kegiatan/hapus/'.$kgt->id_kegiatan); ?>" class="btn btn-danger btn-sm mb-1 btn-hapus"><i class="fas fa-trash"></i></a>
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
				<h5 class="modal-title">Form Tambah Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/kegiatan/tambah'); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3  col-form-label">Nama Kegiatan<sup class="text-red">*</sup></label>
						<div class="col-sm-8 mt-1">
							<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Nomor Kegiatan<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_kegiatan" id="no_kegiatan" required>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group" id="datepicker">
								<input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" required>
								
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_kegiatan" id="keterangan_kegiatan"></textarea>
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


<?php foreach($kegiatan as $kgt) { ?>
<div class="modal fade" id="modalEdit<?= $kgt->id_kegiatan ?>">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/kegiatan/edit/'.$kgt->id_kegiatan); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Nama Kegiatan<sup class="text-red">*</sup></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="<?= $kgt->nama_kegiatan ?>" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Nomor Kegiatan<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_kegiatan" id="no_kegiatan" value="<?= $kgt->no_kegiatan ?>" required>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group" id="datepicker">
								<input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" value="<?= $kgt->tgl_kegiatan ?>" required>
							
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_kegiatan" id="keterangan_kegiatan" value="<?= $kgt->keterangan ?>"> <?= $kgt->keterangan ?> </textarea>
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