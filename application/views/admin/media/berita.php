<div class="card">
    <div class="card-header">
        <div>
            <a href="<?= base_url('admin/media/berita/tulis') ?>" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i>
                &nbsp;&nbsp;Tambah Berita
            </a>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="berita1" class="table table-bordered " width="100%">
            <thead>
                <tr style="font-size: 14px;">
                    <th width="3%">No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th width="16%">
                        <center>Opsi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($berita as $b) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->tanggal ?></td>
                        <td><?= $b->judul ?></td>
                        <td><?= html_entity_decode($b->isi) ?></td>
                        <td><?= $b->is_active ?></td>
                        <td>
                            <center><img src="<?= base_url('uploads/') . $b->gambar ?>" alt="<?= $b->gambar ?>" style="width: 135px;"></center>
                        </td>
                        <td>
                            <center>
                                <a href="<?= base_url('admin/media/berita/hapus/' . $b->id) ?>" class="btn btn-danger btn-sm mb-1 btn-hapus"><i class="fas fa-trash"></i></a>
                            </center>
                        </td>

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
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