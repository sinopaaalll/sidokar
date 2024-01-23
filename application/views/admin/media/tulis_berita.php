<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('admin/media/berita/tambah') ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="tgl">Tanggal</label>
                                <input type="date" class="form-control" name="tgl" required>
                            </div>
                            <div class="col-6">
                                <label for="gambar">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar" required>
                                    <label class="custom-file-label" for="file">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="col-6">
                                <label for="judul">Slug</label>
                                <input type="text" readonly class="form-control" name="slug" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Aktif" checked>
                            <label class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Tidak Aktif">
                            <label class="form-check-label">Tidak Aktif</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="<?= base_url('admin/media/berita') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Back </a>
                        <button type="submit" class="btn btn-primary"> Submit &nbsp; <i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    CKEDITOR.replace('content');


    $(document).ready(function() {
        $('input[name="judul"]').on('input', function() {
            var judul = $(this).val();
            var slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/-$/, '').replace(/^-/, '');
            $('input[name="slug"]').val(slug);
        });
    });
</script>