<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halo <?= $this->session->userdata('nama'); ?>, Ini adalah halaman profil kamu!</h1>
    <div class="card" style="width: 30rem;">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/'.$this->session->userdata('gambar')); ?>" class="card-img" alt="<?= $this->session->userdata('nama'); ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $this->session->userdata('nama'); ?></h5>
                    <p class="card-text">Username: <?= $this->session->userdata('username'); ?></p>
                    <p class="card-text"><small class="text-muted">Terdaftar Sejak <?= date('d F Y',$user['date_created']) ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->