<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-bordered " width="100%">
            <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th width="40%">Gambar</th>
                    <th width="16%">
                        <center>Opsi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($struktur as $s) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <center><img src="<?= base_url('uploads/') . $s->gambar ?>" alt="<?= $s->gambar ?>" style="width: 135px;"></center>
                        </td>
                        <td>
                            <center>
                                <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#modalEdit<?= $s->id ?>"><i class="fas fa-edit"></i></button>
                            </center>
                        </td>

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($struktur as $s) { ?>
    <div class="modal fade" id="modalEdit<?= $s->id ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Struktur Organisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" action="<?= base_url('admin/media/struktur/edit/' . $s->id); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                    <label class="custom-file-label" for="file">Pilih Gambar</label>
                                    <input type="hidden" name="old_foto" value="<?= $s->gambar ?>">
                                </div>
                            </div>
                            <div class="offset-2 col-sm-6">
                                <a>*</a> <a style="font-size: 13px;">Gambar berupa JPG dan PNG. Ukuran Maksimal 2 MB </a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<?php
if ($this->session->flashdata('success')) { ?>
    <script>
        var successMessage = <?php echo json_encode($this->session->flashdata('success')); ?>;
        $(document).ready(function() {
            Swal.fire("Good Job!", successMessage, "success");
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