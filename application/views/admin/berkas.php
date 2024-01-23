<div class="card">
        <div class="card-header">
            <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Berkas
            </button>
            </div>
        
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered "  width="100%">
                <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th width="40%">Nama Berkas</th>
                    <th width="5%">Jenis</th>
                    <th width="10%">Upload by</th>
                    <th width="10%">Tgl Berkas</th>
                    <th width="14%">Gambar</th>
                    <th width="2%">Status</th>
                    <th width="16%"><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($berkas as $bks) : ?>
                
                <tr>
                    <td><center><?= $no++ ?></center></td>
                    <td><?= $bks->nama_berkas ?><hr style="margin: 5px -2px;"><a style="font-size: 13px;">No. <?= $bks->no_berkas ?></a></td>
                    <td><?= $bks->kategori ?></td>
                    <td><?= $bks->upload_by ?></td>
                    <td><center><?= $bks->tgl_berkas ?></center></td>
                    <td><center><img src="<?= base_url('uploads/') .$bks->gambar_berkas?>" alt="<?= $bks->gambar_berkas ?>" style="width: 135px;"></center></td>
                    <td><?= $bks->status ?></td>
                    <td>
                        <center>
                        <a class="btn btn-secondary btn-sm mb-1" data-toggle="modal" data-target="#modalLihat"><i class="fas fa-eye"></i></a>
                        <a href="" class="btn btn-info btn-sm mb-1"><i class="fas fa-download"></i></a>
                        <button class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalEdit<?= $bks->id ?>"><i class="fas fa-edit"></i></button>
                        <a href="" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></a>
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
				<h5 class="modal-title">Form Tambah Berkas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/berkas/tambah'); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_berkas" id="nama_berkas" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Nomor Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nomor_berkas" id="nomor_berkas" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Jenis Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<select class="form-control selectpicker" name="jenis_berkas" id="jenis_berkas" required>
								<option selected disabled>-- Silahkan Pilih --</option>
									<option value="test">test</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Upload By <sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="upload_by" id="upload_by" required>
								<option selected disabled>-- Silahkan Pilih --</option>
								<option value="test1">test1</option>
                                <option value="test2">test2</option>
                                <option value="test3">test3</option>
							</select>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group date" id="datepicker">
								<input type="text" class="form-control" name="tgl_berkas" id="tgl_berkas" required>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="fa fa-fw fa-calendar-alt"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">File Upload</label>
						<div class="col-sm-5">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file_berkas" id="file_berkas">
								<label class="custom-file-label" for="file">Pilih file</label>
							</div>
						</div>
                        <div class="offset-2 col-sm-6">
                        <a>*</a> <a style="font-size: 13px;">File berupa PDF, Excel, dan Word. Ukuran Maksimal 50 MB</a>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Gambar</label>
						<div class="col-sm-5">
							<div class="custom-file">
								<input type="file" class="custom-file-input"  name="gambar_berkas" id="gambar_berkas">
								<label class="custom-file-label" for="file">Pilih Gambar</label>
							</div>
						</div>
                        <div class="offset-2 col-sm-6">
                        <a >*</a> <a style="font-size: 13px;">Gambar berupa JPG dan PNG. Ukuran Maksimal 2 MB </a>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_berkas" id="keterangan_berkas"></textarea>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Status <sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="status_berkas" id="status_berkas">
								<option selected disabled>-- Silahkan Pilih --</option>
									<option value="test">test</option>
							</select>
						</div>
					</div>
                    
					<div class="form-group row">
						<div class="offset-2 col-sm-6">
							<button type="submit" class="btn btn-primary btn_save">Simpan</button>
							
						</div>
					</div>
                    <div class="form-group row">
						<div class="offset-2 col-sm-6">
                        <a class="text-red">*</a> <a style="font-size: 13px;">= <b>&nbsp;Tidak Boleh Kosong</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalLihat">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Lihat Berkas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
           
			</div>
		</div>
	</div>
</div>

<?php foreach($berkas as $bks) { ?>
<div class="modal fade" id="modalEdit<?= $bks->id ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Berkas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
            <form id="form" action="<?= base_url('admin/berkas/edit/'.$bks->id); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_berkas" id="nama_berkas" value="<?= $bks->nama_berkas ?>" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Nomor Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nomor_berkas" id="nomor_berkas"  value="<?= $bks->no_berkas ?>" required>
						</div>
                    </div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Jenis Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<select class="form-control selectpicker" name="jenis_berkas" id="jenis_berkas"  required>
								<option selected value="<?= $bks->kategori ?>"><?= $bks->kategori ?></option>
									<option value="test">test</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Upload By <sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="upload_by" id="upload_by" required>
								<option selected value="<?= $bks->upload_by ?>"><?= $bks->upload_by ?></option>
								<option value="test1">test1</option>
                                <option value="test2">test2</option>
                                <option value="test3">test3</option>
							</select>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group date" id="datepicker">
								<input type="text" class="form-control" name="tgl_berkas" id="tgl_berkas" value="<?= $bks->tgl_berkas ?>" required>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="fa fa-fw fa-calendar-alt"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">File Upload</label>
						<div class="col-sm-5">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file_berkas" id="file_berkas" value="<?= $bks->file_berkas ?>">
								<label class="custom-file-label" for="file"><?= $bks->file_berkas ?></label>
							</div>
						</div>
                        <div class="offset-2 col-sm-6">
                        <a>*</a> <a style="font-size: 13px;">File berupa PDF, Excel, dan Word. Ukuran Maksimal 50 MB</a>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Gambar</label>
						<div class="col-sm-5">
							<div class="custom-file">
								<input type="file" class="custom-file-input"  name="gambar_berkas" id="gambar_berkas" value="<?= $bks->gambar_berkas ?>">
								<label class="custom-file-label" for="file"><?= $bks->gambar_berkas ?></label>
							</div>
						</div>
                        <div class="offset-2 col-sm-6">
                        <a >*</a> <a style="font-size: 13px;">Gambar berupa JPG dan PNG. Ukuran Maksimal 2 MB </a>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_berkas" id="keterangan_berkas" value="<?= $bks->keterangan ?>"><?= $bks->keterangan ?></textarea>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-2 col-form-label">Status <sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="status_berkas" id="status_berkas">
								<option selected value="<?= $bks->status ?>"><?= $bks->status ?></option>
									<option value="test">test</option>
							</select>
						</div>
					</div>
                    
					<div class="form-group row">
						<div class="offset-2 col-sm-6">
							<button type="submit" class="btn btn-primary btn_save">Simpan</button>
							
						</div>
					</div>
                    <div class="form-group row">
						<div class="offset-2 col-sm-6">
                        <a class="text-red">*</a> <a style="font-size: 13px;">= <b>&nbsp;Tidak Boleh Kosong</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>