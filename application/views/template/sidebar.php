<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">APLIKASI PAK</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->

  <?php if($this->session->userdata('role_id') == 1) : ?>
    <div class="sidebar-heading">
      Admin
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/home'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/pendaftar'); ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Pendaftar</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/pegawai'); ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Pegawai</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/pak'); ?>">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>PAK</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/unsur'); ?>">
      <i class="fas fa-fw fa-list-ul"></i>
      <span>Unsur Kegiatan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">
      <i class="fas fa-fw fa-list-ul"></i>
      <span>Kegiatan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/pengguna'); ?>">
      <i class="fas fa-fw fa-user"></i>
      <span>Data Pengguna</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Tools
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/user'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span></a>
    </li>

  <?php endif; ?>

  <?php if($this->session->userdata('role_id') == 2) : ?>
    <div class="sidebar-heading">
      Kepala Dinas
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pimpinan/home'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pimpinan/pak'); ?>">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>PAK</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Tools
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pimpinan/user'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span></a>
    </li>

  <?php endif; ?>

  <?php if($this->session->userdata('role_id') == 3) : ?>
    <div class="sidebar-heading">
      Penilai
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('penilai/home'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('penilai/pak'); ?>">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>PAK</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Tools
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('penilai/user'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span></a>
    </li>

  <?php endif; ?>

  <?php if($this->session->userdata('role_id') == 4) : ?>
    <div class="sidebar-heading">
      Pendaftar
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pendaftar/home'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pendaftar/pak'); ?>">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>PAK</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Tools
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pendaftar/user'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span></a>
    </li>

  <?php endif; ?>

  
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

    