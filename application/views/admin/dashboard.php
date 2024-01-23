<div class="row">
    <div class="col-12 col-sm-4 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-list"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Kegiatan</span>
                <span class="info-box-number">
                    <?= $total_kegiatan['jml'] ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-4 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number">
                    <?= $total_admin['jml'] ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-4 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-newspaper"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Berita</span>
                <span class="info-box-number">
                    <?= $total_berita['jml'] ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <!-- PIE CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Keterangan Upload Berkas</h3>
            </div>
            <div class="card-body">
                <canvas id="upload_berkas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-12 col-md-6">
        <!-- PIE CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Keterangan Status Berkas</h3>
            </div>
            <div class="card-body">
                <canvas id="status_berkas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="<?= base_url(''); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>



<script>
    $(document).ready(function() {

        var labels_data = <?= json_encode(array_column($upload, 'status_upload')) ?>;
        var datasets_data = <?= json_encode(array_column($upload, 'jumlah')) ?>;

        // Data contoh untuk pie Chart
        var data = {
            labels: labels_data,
            datasets: [{
                label: "Pelanggan",
                backgroundColor: [
                    "#d9534f",
                    "#5cb85c",
                ],
                data: datasets_data
            }]
        };


        // Konfigurasi Chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom'
            },
            title: {
                display: false,
                // text: "Data Pelanggan"
            },
        };

        // Inisialisasi Chart
        var ctx = document.getElementById("upload_berkas").getContext("2d");
        var lineChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    });

    $(document).ready(function() {

        var labels_data = <?= json_encode(array_column($confirm, 'status_confirm')) ?>;
        var datasets_data = <?= json_encode(array_column($confirm, 'jumlah')) ?>;

        // Data contoh untuk pie Chart
        var data = {
            labels: labels_data,
            datasets: [{
                label: "Pelanggan",
                backgroundColor: [
                    "#d9534f",
                    "#5cb85c",
                ],
                data: datasets_data
            }]
        };


        // Konfigurasi Chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom'
            },
            title: {
                display: false,
                // text: "Data Pelanggan"
            },
        };

        // Inisialisasi Chart
        var ctx = document.getElementById("status_berkas").getContext("2d");
        var lineChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    });
</script>