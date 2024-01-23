<div class="card">
            <div class="card-header">
                <center>
            <a style="font-size: 16px;"><b>Kegiatan : <?= $kegiatan->nama_kegiatan ?></b></a>
                </center>
            </div>
        <div class="card-header">
            
            <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Berkas
            </button>
            <div class="float-right">
            <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </div>
            </div>
            
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="berkasberkas1" class="table table-bordered "  width="100%">
                <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th width="22%">Item Berkas</th>
                    <th width="10%">Jenis Berkas</th>
                    <th width="9%">Tgl Berkas</th>
                    <th width="11%">Status Upload</th>
                    <th width="11%">Status Konfirm</th>
                    <th width="15%">Keterangan</th>
                    <th width="13%"><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($berkas_berkas as $bksbks) : ?>
                
                <tr>
                    <td><center><?= $no++ ?></center></td>
                    <td><?= $bksbks->item_berkas ?><hr style="margin: 5px -2px;"><a style="font-size: 13px;">No. <?= $bksbks->no_berkas ?></a></td>
                    <td><center><?= $bksbks->jenis_berkas ?></center></td>
                    <td><center><?= $bksbks->tgl_berkas ?></center></td>
                    <td><center>
                    <?php if($bksbks->status_upload=='Terupload'): ?>
                    <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?> </b></a><a style="font-size: 14px;">by <?= $bksbks->upload_by ?></a>
                    <?php elseif($bksbks->file_berkas==null): ?>
                    <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?></b></a>
                    <?php endif; ?>
                    </center>
                    </td>
                    <td><center>
                    <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>
                        <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>
                        <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php endif; ?>
                    </center></td>
                    <td><a style="font-size: 14px;"><?= $bksbks->keterangan ?></a></td>
                    <td>
                        <center>
                        
                        <?php if($bksbks->jenis_berkas=='dokumen'): ?>
                            <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modalUploadDok<?= $bksbks->id_berkas ?>"><i class="fas fa-upload"></i> </button>
                            <button class="btn btn-secondary btn-sm mb-1" data-toggle="modal" data-target="#modalLihatDok<?= $bksbks->id_berkas ?>"><i class="fas fa-eye"></i></button>
                        <?php elseif($bksbks->jenis_berkas=='gambar'): ?>
                            <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modalUploadPic<?= $bksbks->id_berkas ?>"><i class="fas fa-upload"></i> </button>
                            <button class="btn btn-secondary btn-sm mb-1" data-toggle="modal" data-target="#modalLihatPic<?= $bksbks->id_berkas ?>"><i class="fas fa-eye"></i></button>
                        <?php endif; ?>
                            <button class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalEdit<?= $bksbks->id_berkas ?>"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/berkas_berkas/hapus/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" class="btn btn-danger btn-sm mb-1 btn-hapus"><i class="fas fa-trash"></i></a>
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
                <form id="form" action="<?= base_url('admin/berkas_berkas/tambah/'.$id_kegiatan); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Item Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-8 mt-1">
							<input type="text" class="form-control" name="item_berkas" id="item_berkas" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Nomor Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_berkas" id="no_berkas" required>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Jenis Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="jenis_berkas" id="jenis_berkas" required>
								<option selected disabled>-- Silahkan Pilih --</option>
								<option value="dokumen">Dokumen</option>
                                <option value="gambar">Gambar</option>
							</select>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group" id="datepicker">
								<input type="date" class="form-control" name="tgl_berkas" id="tgl_berkas" required>
								
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_berkas" id="keterangan_berkas"></textarea>
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

<?php foreach($berkas_berkas as $bksbks) { ?>
<div class="modal fade" id="modalEdit<?= $bksbks->id_berkas ?>">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Berkas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form" action="<?= base_url('admin/berkas_berkas/edit/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" method="post" autocomplete="off">
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Item Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-8 mt-1">
							<input type="text" class="form-control" name="item_berkas" id="item_berkas"  value="<?= $bksbks->item_berkas ?>" required>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Nomor Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_berkas" id="no_berkas"  value="<?= $bksbks->no_berkas ?>"required>
						</div>
                    </div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Jenis Berkas<sup class="text-red">*</sup></label>
						<div class="col-sm-3">
							<select class="form-control selectpicker" name="jenis_berkas" id="jenis_berkas" required>
                                <option value="<?= $bksbks->jenis_berkas ?>"selected><?= $bksbks->jenis_berkas ?></option>
								<option disabled>-- Silahkan Pilih --</option>
								<option value="dokumen">Dokumen</option>
                                <option value="gambar">Gambar</option>
							</select>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl. Berkas <sup class="text-red">*</sup></label>
						<div class="col-sm-4">
							<div class="input-group" id="datepicker">
								<input type="date" class="form-control" name="tgl_berkas" id="tgl_berkas" value="<?= $bksbks->tgl_berkas ?>" required>
								
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Keterangan </label>
						<div class="col-sm-7">
							<textarea class="form-control" name="keterangan_berkas" id="keterangan_berkas" value="<?= $bksbks->keterangan ?>"><?= $bksbks->keterangan ?></textarea>
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


<?php foreach($berkas_berkas as $bksbks) { ?>
<div class="modal fade" id="modalUploadDok<?= $bksbks->id_berkas ?>">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Berkas Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
            <form id="form" action="<?= base_url('admin/berkas_berkas/uploaddok/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                <div class="form-group row">
						<label class="offset-2 col-form-label">Upload By&nbsp;</label>
						<div class="col-sm-4 mt-1">
							<select class="form-control selectpicker" name="upload_by" id="upload_by" <?php if($bksbks->file_berkas!==null): ?> disabled <?php endif; ?> required>
								<?php if($bksbks->file_berkas!==null): ?><option value="<?= $bksbks->upload_by ?>" selected ><?= $bksbks->upload_by ?></option><?php endif; ?>
                                <option <?php if($bksbks->file_berkas==null): ?> selected <?php endif; ?> disabled>-- Silahkan Pilih --</option>
                                <?php foreach ($list_bidang as $lbdg): ?>
								<option value="<?= $lbdg->nama_bidang ?>"><?= $lbdg->nama_bidang ?></option>
								<?php endforeach ?>
							</select>
						</div>
			    </div>
                <div class="form-group row">
						<div class="offset-2 col-sm-8">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file_berkas" id="file_berkas" <?php if($bksbks->file_berkas!==null): ?>value="<?= $bksbks->file_berkas ?>" disabled <?php endif; ?> required>
								<label class="custom-file-label" for="file"><?= $bksbks->file_berkas ?></label>
							</div>
						</div>
                        <div class="offset-2 col-sm-9">
                        <a>*</a> <a style="font-size: 13px;">File berupa PDF, Excel, dan Word. Ukuran Maksimal 50 MB</a>
						</div>
			    </div>
                <div class="form-group row">
						<div class="offset-3 col-sm-9">
                        <div class="row">
                            <div>
							<button type="submit" class="btn btn-success btn_save" <?php if($bksbks->file_berkas!==null): ?> disabled <?php endif; ?>>Upload</button>
                            </div>
                            
                            <div class="offset-3">
                            <a href="<?= base_url('admin/berkas_berkas/hapusdok/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->file_berkas==null): ?> class="btn btn-danger disabled" <?php elseif($bksbks->file_berkas!==null): ?>class="btn btn-danger btn-hapus"<?php endif; ?>>Hapus</a>
                            </div>
                        </div>
                        </div>
                </div>
            </form>            
            </div>
		</div>
	</div>
</div>
<?php } ?>

<?php foreach($berkas_berkas as $bksbks) { ?>
<div class="modal fade" id="modalUploadPic<?= $bksbks->id_berkas ?>">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Berkas Gambar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
            <form id="form" action="<?= base_url('admin/berkas_berkas/uploadpic/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="form-group row">
						<label class="offset-2 col-form-label">Upload By&nbsp;</label>
						<div class="col-sm-4 mt-1">
							<select class="form-control selectpicker" name="upload_by" id="upload_by" <?php if($bksbks->file_berkas!==null): ?> disabled <?php endif; ?> required>
								<?php if($bksbks->file_berkas!==null): ?><option value="<?= $bksbks->upload_by ?>" selected ><?= $bksbks->upload_by ?></option><?php endif; ?>
                                <option <?php if($bksbks->file_berkas==null): ?> selected <?php endif; ?> disabled>-- Silahkan Pilih --</option>
                                <?php foreach ($list_bidang as $lbdg): ?>
								<option value="<?= $lbdg->nama_bidang ?>"><?= $lbdg->nama_bidang ?></option>
								<?php endforeach ?>
							</select>
						</div>
			    </div>
                <div class="form-group row">
						<div class="offset-2 col-sm-8">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file_berkas" id="file_berkas" <?php if($bksbks->file_berkas!==null): ?>value="<?= $bksbks->file_berkas ?>" disabled <?php endif; ?> required>
								<label class="custom-file-label" for="file"><?= $bksbks->file_berkas ?></label>
							</div>
						</div>
                        <div class="offset-2 col-sm-9">
                        <a>*</a> <a style="font-size: 13px;">Gambar berupa JPG dan PNG. Ukuran Maksimal 2 MB</a>
						</div>
			    </div>
                <div class="form-group row">
						<div class="offset-3 col-sm-9">
                        <div class="row">
                            <div>
							<button type="submit" class="btn btn-success btn_save" <?php if($bksbks->file_berkas!==null): ?> disabled <?php endif; ?>>Upload</button>
                            </div>
                            
                            <div class="offset-3">
                            <a href="<?= base_url('admin/berkas_berkas/hapusdok/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->file_berkas==null): ?> class="btn btn-danger disabled" <?php elseif($bksbks->file_berkas!==null): ?>class="btn btn-danger btn-hapus"<?php endif; ?>>Hapus</a>
                            </div>
                        </div>
                        </div>
                </div>
            </form>    
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php foreach($berkas_berkas as $bksbks) { ?>
<div class="modal fade" id="modalLihatDok<?= $bksbks->id_berkas ?>">
	<div class="modal-dialog modal-dialog-centered "> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Lihat Berkas Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row mb-1">
                <label class="col-md-4">Kegiatan</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $kegiatan->nama_kegiatan ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Nama Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->item_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Nomor Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->no_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Tanggal Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->tgl_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Upload By</label>
                <label class="col-ms">:</label>
                <div class="col"><?php if($bksbks->status_upload=='Terupload'): ?>
                    <a><?= $bksbks->upload_by ?></a>
                    <?php elseif($bksbks->file_berkas==null): ?>
                    <?php endif; ?></div>
                </div>  
                <div class="row mb-1">
                <label class="col-md-4">Status</label>
                <label class="col-ms">:</label>
                <div class="col"><?php if($bksbks->status_upload=='Terupload'): ?>
                    <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?> </b></a><a style="font-size: 14px;"></a>
                    <?php elseif($bksbks->file_berkas==null): ?>
                    <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?></b></a>
                    <?php endif; ?>,&nbsp;<?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>
                        <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>
                        <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php endif; ?></div>
                </div>
                <div class="row ">
                <label class="col-md-4 ">Nama File</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->file_berkas ?></div>
                </div>
                <div class="row mb-4">
                <label class="col-md-4 ">Keterangan</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->keterangan ?></div>
                </div>
                
                <div class="row mb-4">
                <div class="offset-2 col-sm-9 ">
                        <div class="row">
                        <?php if($bksbks->status_upload=='Terupload'): ?>
                            <div>
							<a href="<?= base_url('admin/berkas_berkas/downloaddok/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" class="btn btn-info mb-1"><i class="fas fa-download"></i>&nbsp;&nbsp;Download</a>
                            </div>
                            <?php $role = $this->session->userdata('role');
                            if ($role !== 'Kepala') : ?>
                            <div class="offset-1 mb-2 ">
                            <a href="<?= base_url('admin/berkas_berkas/send_mail/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-warning  mb-1 disabled"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-warning  mb-1"<?php endif; ?>><i class="fas fa-envelope"></i>&nbsp;&nbsp;Kirim Notif Email</a>
                            </div>
                            <?php endif; ?>
                            <?php $role = $this->session->userdata('role');
                            if ($role !== 'Petugas') : ?>
                            <div class="offset-1  mb-2 ">
                            <a href="<?= base_url('admin/berkas_berkas/confirm/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-success  mb-1 disabled"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-success  btn-confirm mb-1"<?php endif; ?>><i class="fas fa-check"></i>&nbsp;&nbsp;Konfirmasi</a>
                            </div>
                            <div class="offset-1">
                            <a href="<?= base_url('admin/berkas_berkas/batalconfirm/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-danger btn-btlconfirm  mb-1"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-danger  mb-1 disabled"<?php endif; ?>><i class="fas fa-times"></i>&nbsp;&nbsp;Batal Konfirmasi</a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div ><center>
                <div class="col"><a class="text-secondary" style="font-size: 13px;">Ditambahkan : <?= $bksbks->waktu_upload ?>,</a>&nbsp;<a class="text-secondary" style="font-size: 13px;">Berkas Diubah : <?= $bksbks->waktu_diubah ?></a></div>
                </center>
                </div>
            </div>
                
                
                
		</div>
    </div>
</div>
<?php } ?>

<?php foreach($berkas_berkas as $bksbks) { ?>
<div class="modal fade" id="modalLihatPic<?= $bksbks->id_berkas ?>">
	<div class="modal-dialog modal-dialog-centered modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Lihat Berkas Gambar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row">
            <div class="col-md-7">
            <div class="row mb-1">
                <label class="col-md-4">Kegiatan</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $kegiatan->nama_kegiatan ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Nama Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->item_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Nomor Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->no_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Tanggal Berkas</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->tgl_berkas ?></div>
                </div>
                <div class="row mb-1">
                <label class="col-md-4">Upload By</label>
                <label class="col-ms">:</label>
                <div class="col"><?php if($bksbks->status_upload=='Terupload'): ?>
                    <a><?= $bksbks->upload_by ?></a>
                    <?php elseif($bksbks->file_berkas==null): ?>
                    <?php endif; ?></div>
                </div>  
                <div class="row mb-1">
                <label class="col-md-4">Status</label>
                <label class="col-ms">:</label>
                <div class="col"><?php if($bksbks->status_upload=='Terupload'): ?>
                    <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?> </b></a><a style="font-size: 14px;"></a>
                    <?php elseif($bksbks->file_berkas==null): ?>
                    <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_upload ?></b></a>
                    <?php endif; ?>,&nbsp;<?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>
                        <a class="text-green" style="font-size: 14px;"><i class="fa fa-check"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>
                        <a class="text-red" style="font-size: 14px;"><i class="fa fa-times"></i><b>&nbsp;&nbsp;<?= $bksbks->status_confirm ?></b></a>
                    <?php endif; ?></div>
                </div>
                <div class="row mb-4">
                <label class="col-md-4 ">Keterangan</label>
                <label class="col-ms">:</label>
                <div class="col"><?= $bksbks->keterangan ?></div>
                </div>
                <div class="row mb-4">
                <div class="offset-1 col-sm-10 ">
                        <div class="row">
                        <?php if($bksbks->status_upload=='Terupload'): ?>
                            <div>
							<a href="<?= base_url('admin/berkas_berkas/downloaddok/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" class="btn btn-info  mb-1"><i class="fas fa-download"></i>&nbsp;&nbsp;Download</a>
                            </div>
                            <?php $role = $this->session->userdata('role');
                            if ($role !== 'Kepala') : ?>
                            <div class="offset-1 mb-2 ">
                            <a href="<?= base_url('admin/berkas_berkas/send_mail/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-warning  mb-1 disabled"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-warning  mb-1"<?php endif; ?>><i class="fas fa-envelope"></i>&nbsp;&nbsp;Kirim Notif Email</a>
                            </div>
                            <?php endif; ?>
                            <?php $role = $this->session->userdata('role');
                            if ($role !== 'Petugas') : ?>
                            <div class="offset-1  mb-2 ">
                            <a href="<?= base_url('admin/berkas_berkas/confirm/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-success  mb-1 disabled"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-success btn-confirm mb-1"<?php endif; ?>><i class="fas fa-check"></i>&nbsp;&nbsp;Konfirmasi</a>
                            </div>
                            <div class="offset-1">
                            <a href="<?= base_url('admin/berkas_berkas/batalconfirm/'.$bksbks->id_kegiatan.'/'.$bksbks->id_berkas); ?>" <?php if($bksbks->status_confirm=='Sudah Konfirmasi'): ?>class="btn btn-danger btn-btlconfirm mb-1"<?php elseif($bksbks->status_confirm=='Belum Konfirmasi'): ?>class="btn btn-danger  mb-1 disabled"<?php endif; ?>><i class="fas fa-times"></i>&nbsp;&nbsp;Batal Konfirmasi</a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
           
            
            <div>
                <img src="<?= base_url('uploads/') .$bksbks->file_berkas?>" style="width: 320px;" alt="* Gambar tidak Ditemukan">
            </div>
          
            </div>
            <div ><center>
                <div class="col"><a class="text-secondary" style="font-size: 13px;">Ditambahkan : <?= $bksbks->waktu_upload ?>,</a>&nbsp;<a class="text-secondary" style="font-size: 13px;">Berkas Diubah : <?= $bksbks->waktu_diubah ?></a></div>
                </center>
                </div>
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

        $('.btn-confirm').on('click', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');

            // Menampilkan dialog konfirmasi SweetAlert
            Swal.fire({
                title: "Konfirmasi Berkas?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Konfirmasi'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi logout, arahkan ke URL logout
                    window.location.href = href;
                }
            });
        });
        $('.btn-upload').on('click', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');

            // Menampilkan dialog konfirmasi SweetAlert
            Swal.fire({
                title: "Upload File?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Konfirmasi'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi logout, arahkan ke URL logout
                    window.location.href = href;
                }
            });
        });
        $('.btn-btlconfirm').on('click', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');

            // Menampilkan dialog konfirmasi SweetAlert
            Swal.fire({
                title: "Batalkan Konfirmasi?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Konfirmasi'
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
