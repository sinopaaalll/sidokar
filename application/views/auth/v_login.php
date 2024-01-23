
    <!-- Favicon -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') . 'plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') . 'dist/css/adminlte.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<div class="content mt-5 mb-5 pt-5 pb-5">
    <center>
    <div class="login-box mt-5 mb-5">
        <div class="card">
            <div class="card-header text-center mt-5 pb-5 py-2">
                <img src="<?= base_url('assets/img/logo.png') ?>" width="100">
                <h4 class="text-bold">SIDOKAR</h4>
            </div>
            <div class="card-body login-card-body" style="border-radius: 10px;">

                <form action="<?= base_url('auth/verif') ?>" method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-warning btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.login-card-body -->
            </div>
        </div>
        <p class="text-center">Copyright &copy; 2023 - SIDOKAR
        </p>
    </div>
    </center>
    <!-- /.login-box -->
</div>

