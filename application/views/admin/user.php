<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halo <?= $this->session->userdata('nama'); ?>, Ini adalah halaman profil kamu!</h1>
    <div class="card" style="width: 30rem;">
        <?php $datagambar = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row() ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/'.$datagambar->gambar); ?>" class="card-img" alt="<?= $this->session->userdata('nama'); ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $this->session->userdata('nama'); ?></h5>
                    <p class="card-text">Username: <?= $this->session->userdata('username'); ?></p>
                    <p class="card-text"><small class="text-muted">Terdaftar Sejak <?= date('d F Y',$user['date_created']) ?></small></p>

                    <a href="<?= base_url('pendaftar/user/edit/'.$this->session->userdata('id')); ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->