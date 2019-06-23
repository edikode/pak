<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Pendaftar</h1>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Akses ke Sistem </h5>
                    <p class="card-text">
                        <?php 
                        $queryUser = "SELECT `user`.`id`, `user`.`pegawai_id`,  
                                        `user`.`username`, `user`.`is_active`, `role`.`nama` as `level`
                                        FROM `user` 
                                        JOIN `role`
                                        ON `user`.`role_id` = `role`.`id`
                                        WHERE `user`.`pendaftar_id` = $pendaftar->id 
                                        ORDER BY `user`.`id`  
                                        ";
                        $dataUser = $this->db->query($queryUser)->row();
                        ?>

                        Username : <?= $dataUser->username ?> <br>
                        Level : <?= $dataUser->level ?> <br>
                    </p>
                    <br>
                    <h5 class="card-title">Data Pendaftar</h5>
                    <p class="card-text">
                        NIP : <?= $pendaftar->nip ?> <br>
                        NUPTK : <?= $pendaftar->nuptk ?> <br>
                        KARPEG : <?= $pendaftar->karpeg ?> <br>
                        Nama : <?= $pendaftar->nama ?> <br>
                        TTL : <?= $pendaftar->tmp_lahir.', '.$pendaftar->tgl_lahir ?> <br>
                        Jenis Kelamin : <?= $pendaftar->jenis_kelamin ?> <br>
                        Agama : <?= $pendaftar->agama ?> <br>
                        Status Guru : <?= $pendaftar->status_guru ?> <br>
                        Tugas Mengajar : <?= $pendaftar->tugas_mengajar ?> <br>
                        Unit Kerja : <?= $pendaftar->unit_kerja ?> <br>
                        
                        <?php $jabatan = $this->db->get_where('jabatan',['id' => $pendaftar->jabatan_id])->row(); ?>
                        
                        Jabatan : <?= $jabatan->nama ?> <br>
                        Pangkat : <?= $jabatan->pangkat ?> <br>
                        Gol Ruang : <?= $jabatan->gol_ruang ?> <br>

                        <?php $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['id' => $pendaftar->jabatan_fungsional_id])->row(); ?>

                        Jabatan Fungsional : <?= $jabatan_fungsional->tugas ?> <br>
                        Alamat Rumah : <?= $pendaftar->alamat_rumah ?> <br>
                        Alamat Sekolah : <?= $pendaftar->alamat_sekolah ?> <br>
                        Telepon : <?= $pendaftar->telepon ?> <br>
                        Email : <?= $pendaftar->email ?> <br>
                    </p>
                    <a href="<?= base_url('admin/pendaftar') ?>" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>    