<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('admin/admin/tambah') ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-4">
                                <label for="bidang">Bidang</label>
                                <select name="bidang" id="bidang" class="form-control">
                                <option selected disabled>-- Silahkan Pilih --</option>
                                <?php foreach ($list_bidang as $lbdg): ?>
								<option value="<?= $lbdg->nama_bidang ?>"><?= $lbdg->nama_bidang ?></option>
								<?php endforeach ?>
                                </select>
                                <?= form_error('bidang', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="col-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="col-4">
                            <label for="conf_password">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="conf_password">
                            <?= form_error('conf_password', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                            <label class="custom-file-label" for="file">Pilih Gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="Administrator" checked>
                            <label class="form-check-label">Administrator</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="Petugas">
                            <label class="form-check-label">Petugas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="Kepala">
                            <label class="form-check-label">Kepala/pimpinan</label>
                        </div>
                        <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="<?= base_url('admin/admin') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Back </a>
                        <button type="submit" class="btn btn-primary"> Submit &nbsp; <i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>