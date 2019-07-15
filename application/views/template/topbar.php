<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <i class="fas fa-fw fa-home"></i> <a href="<?= base_url('admin/home') ?>">PAK</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= ucfirst($this->uri->segment(2, null)); ?></li>
        </ol>
    </nav>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <?php if($this->session->userdata('role_id') == 4) : ?>
        <?php
        $rekapNilai = $this->db->get_where('rekap_nilai',['status' => 2, 'pendaftar_id' => $this->session->userdata('id')])->row();
        if($rekapNilai) :
        ?>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">!</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Pemberitahuan
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('pendaftar/pak/upload/'.$rekapNilai->id) ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                    <span class="font-weight-bold">Pengajuan ditolak, cek berkas anda kembali!</span>
                    <div class="small text-gray-500">Tanggal pengajuan : <?= date('d-m-Y',$rekapNilai->tanggal) ?></div>
                    </div>
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('pendaftar/pak') ?>">Tampilkan Semua</a>
            </div>
        </li>
        <?php endif; ?>
        <?php endif; ?>

        <!-- pemberitahuan untuk penilai -->
        <?php if($this->session->userdata('role_id') == 3) : ?>
        <?php
        $rekapNilai = $this->db->get_where('rekap_nilai',['status' => 0])->result();
        if($rekapNilai) :
        ?>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">!</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Pemberitahuan
                </h6>
                <?php foreach ($rekapNilai as $rekapNilai) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('penilai/pak/validasi/'.$rekapNilai->id) ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                    <span class="font-weight-bold">Pengajuan Baru, lakukan penilaian!</span>
                    <div class="small text-gray-500">Tanggal pengajuan : <?= date('d-m-Y',$rekapNilai->tanggal) ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
                
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('penilai/pak') ?>">Tampilkan Semua</a>
            </div>
        </li>
        <?php endif; ?>
        <?php endif; ?>

        <div class="topbar-divider d-none d-sm-block"></div>

        <?php $datagambar = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row() ?>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama') ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/'.$datagambar->gambar); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('admin/user') ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            </div>
        </li>

    </ul>

</nav>