<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Pegawai</h1>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $pegawai->nama ?></h5>
                    <p class="card-text">
                        NIP : <?= $pegawai->nip ?> <br>
                        Nama : <?= $pegawai->nama ?> <br>
                        TTL : <?= $pegawai->tmp_lahir.', '.$pegawai->tgl_lahir ?> <br>
                        Jenis Kelamin : <?= $pegawai->jenis_kelamin ?> <br>
                        Status : <?= $pegawai->status ?> <br>
                        Agama : <?= $pegawai->agama ?> <br>
                        Jabatan : <?= $pegawai->jabatan ?> <br>
                        Telepon : <?= $pegawai->telepon ?> <br>
                        Alamat : <?= $pegawai->alamat ?> <br>
                    </p>
                    <a href="<?= base_url('admin/pegawai') ?>" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>    