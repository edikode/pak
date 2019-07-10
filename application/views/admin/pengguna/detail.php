<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Pengguna</h1>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Akses Ke Sistem</h5>
                    <p class="card-text">
                        Username : <?= $pengguna->username ?> <br>
                        Level : <?= $pengguna->level ?> <br>
                    </p>
                    <br>
                    <h5 class="card-title">Data Pegawai</h5>
                    <p class="card-text">
                        <?php 
                        
                        if($pengguna->pendaftar_id != ""){
                            $dataPegawai = $this->db->get_where('pendaftar',['id' => $pengguna->pendaftar_id])->row(); ?>

                            NIP : <?= $dataPegawai->nip ?> <br>
                            Nama : <?= $dataPegawai->nama ?> <br>
                            TTL : <?= $dataPegawai->tmp_lahir.', '.$dataPegawai->tgl_lahir ?> <br>
                            Jenis Kelamin : <?= $dataPegawai->jenis_kelamin ?> <br>

                        <?php    
                        } else {
                            $dataPegawai = $this->db->get_where('pegawai',['id' => $pengguna->pegawai_id])->row(); ?>

                            NIP : <?= $dataPegawai->nip ?> <br>
                            Nama : <?= $dataPegawai->nama ?> <br>
                            TTL : <?= $dataPegawai->tmp_lahir.', '.$dataPegawai->tgl_lahir ?> <br>
                            Jenis Kelamin : <?= $dataPegawai->jenis_kelamin ?> <br>
                            Status : <?= $dataPegawai->status ?> <br>
                            Agama : <?= $dataPegawai->agama ?> <br>
                            Jabatan : <?= $dataPegawai->jabatan ?> <br>
                            Telepon : <?= $dataPegawai->telepon ?> <br>
                            Alamat : <?= $dataPegawai->alamat ?> <br>

                        <?php }?>
                    </p>
                    <a href="<?= base_url('admin/pengguna') ?>" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>    