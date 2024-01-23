<div class="card">
    <div class="card-header">
        <div>
            <a href="<?= base_url('admin/admin/tambah') ?>" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Admin
            </a>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="admin1" class="table table-bordered " width="100%">
            <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Bidang</th>
                    <th>Role</th>
                    <th>Gambar</th>
                    <th width="16%">
                        <center>Opsi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($admin as $a) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a->nama ?></td>
                        <td><?= $a->email ?></td>
                        <td><?= $a->bidang ?></td>
                        <td><?= $a->role ?></td>
                        <td>
                            <center><img src="<?= base_url('uploads/') . $a->gambar ?>" alt="<?= $a->gambar ?>" style="width: 135px;"></center>
                        </td>
                        <td>
                            <center>
                                <a href="<?= base_url('admin/admin/hapus/' . $a->id) ?>" class="btn btn-danger btn-sm mb-1 btn-hapus"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title">Form Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" action="<?= base_url('admin/media/agenda/tambah'); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar" required>
                                <label class="custom-file-label" for="file">Pilih Gambar</label>
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