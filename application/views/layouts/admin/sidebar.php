<body class="hold-transition sidebar-mini  layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-gradient-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h4><b>SIDOKAR</b></h4>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

  
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary bg-gradient-warning elevation-4">
    <!-- Brand Logo -->
        <a  class="brand-link bg-gradient-primary" style="display:flex;align-items:center;justify-content:center;">
      <img src="<?= base_url('assets/img')?>/logo.png" alt="Logo" class="brand-image elevation-2" style="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('uploads/') . $this->session->userdata('gambar') ?>" class="img-circle elevation-2" alt="#">
        </div>
        <div class="info">
          <a href="<?= base_url('admin/profile') ?>" class="d-block"><?= $this->session->userdata('nama') ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?php if($title == 'Dashboard') : ?> active <?php endif; ?>">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-header mt-">Berkas</li>
              <li class="nav-item">
                <a href="<?= base_url('admin/kegiatan') ?>" class="nav-link <?php if($title == 'Kegiatan' || $title == 'Kegiatan  / Berkas') : ?> active <?php endif; ?>">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Kegiatan</p>
                </a>
              </li>
              <?php $role = $this->session->userdata('role');
              if ($role == 'Administrator'|| $role == 'Kepala') : ?>
          <li class="nav-header mt-1">Media</li>
          <li class="nav-item <?php if($title == 'Kelola Slider' || $title =='Kelola Berita' || $title =='Kelola Agenda' ||$title == 'Kelola Struktur Organisasi' || $title =='Tulis Berita' ) : ?> menu-open <?php endif; ?>">
              <a href="#" class="nav-link <?php if($title == 'Kelola Slider' ||$title == 'Kelola Berita' || $title =='Kelola Agenda' || $title =='Kelola Struktur Organisasi' || $title =='Tulis Berita') : ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Kelola Media
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/media/slider') ?>" class="nav-link <?php if($title == 'Kelola Slider') : ?> active <?php endif; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Kelola Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/media/berita') ?>" class="nav-link <?php if($title == 'Kelola Berita' || $title == 'Tulis Berita') : ?> active <?php endif; ?>">
                  <i class="fas fa-newspaper nav-icon"></i>
                  <p>Kelola Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/media/agenda') ?>" class="nav-link <?php if($title == 'Kelola Agenda') : ?> active <?php endif; ?>">
                  <i class="fas fa-calendar nav-icon"></i>
                  <p>Kelola Agenda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/media/struktur') ?>" class="nav-link <?php if($title == 'Kelola Struktur Organisasi') : ?> active <?php endif; ?>">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Kelola SO</p>
                </a>
              </li>
            </ul>
              </li>
              <?php endif; ?>
              <?php if($role == 'Administrator'): ?>
          <li class="nav-header mt-1">Config</li>
          
              <li class="nav-item <?php if($title == 'Kelola Bidang' ) : ?> menu-open <?php endif; ?>">
              <a href="#" class="nav-link <?php if($title == 'Kelola Bidang') : ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Konfigurasi File
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/bidang') ?>" class="nav-link <?php if($title == 'Kelola Bidang') : ?> active <?php endif; ?>">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Kelola Bidang</p>
                </a>
              </li>
            </ul>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/admin') ?>" class="nav-link <?php if($title == 'Kelola Admin' || $title == 'Tambah Admin') : ?> active <?php endif; ?>">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Kelola Admin</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item mt-3">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?= $menu ?></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">