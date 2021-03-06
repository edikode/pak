<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat datang di Aplikasi <br>PENILAIAN ANGKA KREDIT (PAK)</h1>

    <div class="row">

        <?php $pendaftar = $this->db->get('pendaftar')->num_rows(); ?>
        <div class="col-md-6">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftar ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <?php $pengajuan = $this->db->get_where('rekap_nilai',['status' => 0])->num_rows(); ?>
        <div class="col-md-6">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengajuan Belum Divalidasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengajuan ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->