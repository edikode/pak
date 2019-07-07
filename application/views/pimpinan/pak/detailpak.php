<div class="container-fluid">

    <?php
    // jika status 0 maka pengajuan belum di nilai
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $pendaftar_id, 'status' => 0])->row();

    if($dataRekapNilai) : 
        
        $pendaftar = $this->db->get_where('pendaftar',['id' => $dataRekapNilai->pendaftar_id])->row();

        ?>

        <h1 class="h3 mb-4 text-gray-800">Nama Pendaftar : <?= $pendaftar->nama ?></h1>
        <hr>
    <!-- pengajuan belum dinilai -->

        <?php
        // jika pengajuan sudah lengkap maka field lengkap bernilai 1
        if($dataRekapNilai->lengkap == 1): ?>

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h3 mb-4 text-gray-800">Pengajuan Menunggu Penilaian</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Ke - <?= $dataRekapNilai->pengajuan_ke ?></h6>
                        </div>
                        <div class="card-body">
                            Kelengkapan Berkas = <?php if($dataRekapNilai->lengkap == 1){ echo "<span class='badge badge-success'>Lengkap</span>"; } else { echo "<span class='badge badge-danger'>Belum Lengkap</span>"; } ?> <br>
                            Status Pengajuan = <?php if($dataRekapNilai->status == 1){ echo "<span class='badge badge-success'>Diterima</span>"; } else { echo "<span class='badge badge-warning'>Belum Dinilai</span>"; } ?> <br>
                            Tanggal Pengajuan = <?= date('d F Y',$dataRekapNilai->tanggal) ?> <br>
                            <br>
                            <strong>Jabatan</strong><br>
                            <?php $jabatan = $this->db->get_where('jabatan',['id' => $dataRekapNilai->dari])->row(); ?>
                            Dari => <?= $jabatan->nama ?> -->> <?= $jabatan->pangkat ?> -->> <?= $jabatan->gol_ruang ?><br>

                            <?php $jabatan2 = $this->db->get_where('jabatan',['id' => $dataRekapNilai->dari+1])->row(); ?>
                            Mengajukan ke => <?= $jabatan2->nama ?> -->> <?= $jabatan2->pangkat ?> -->> <?= $jabatan2->gol_ruang ?><br><br>

                            <strong>Syarat Kelulusan</strong><br>
                            Komulatif Minimal = <?= $jabatan2->komulatif_minimal ?><br>
                            Perjenjang = <?= $jabatan2->perjenjang ?>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php else : ?>


        <?php endif; ?>

    <?php else : ?>

    
    <?php endif; ?>

    <!-- berkas ada yg ditolak -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $pendaftar_id, 'status' => 2])->result();
    
    if($dataRekapNilai) :  
    
        $pendaftar = $this->db->get_where('pendaftar',['id' => $dataRekapNilai[0]->pendaftar_id])->row();  ?>

        <h1 class="h3 mb-4 text-gray-800">Nama Pendaftar : <?= $pendaftar->nama ?></h1>
        <hr class='mt-5'>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-4 text-gray-800">Hasil Pengajuan Ditolak</h1>

                <?php foreach($dataRekapNilai as $rekapnilai) : ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengajuan Ke - <?= $rekapnilai->pengajuan_ke ?></h6>
                    </div>
                    <div class="card-body">
                        Kelengkapan Berkas = <?php if($rekapnilai->lengkap == 1){ echo "<span class='badge badge-success'>Lengkap</span>"; } else { echo "<span class='badge badge-danger'>Belum Lengkap</span>"; } ?> <br>
                        Status Pengajuan = <?php if($rekapnilai->status == 2){ echo "<span class='badge badge-danger'>Ditolak</span>"; } else { echo "<span class='badge badge-warning'>Belum Dinilai</span>"; } ?> <br>
                        Tanggal Pengajuan = <?= date('d F Y',$rekapnilai->tanggal) ?> <br>
                        <br>
                        <strong>Jabatan</strong><br>
                        <?php $jabatan = $this->db->get_where('jabatan',['id' => $rekapnilai->dari])->row(); ?>
                        Dari => <?= $jabatan->nama ?> -->> <?= $jabatan->pangkat ?> -->> <?= $jabatan->gol_ruang ?><br>

                        <?php $jabatan2 = $this->db->get_where('jabatan',['id' => $rekapnilai->dari+1])->row(); ?>
                        Mengajukan ke => <?= $jabatan2->nama ?> -->> <?= $jabatan2->pangkat ?> -->> <?= $jabatan2->gol_ruang ?><br><br>

                        <strong>Syarat Kelulusan</strong><br>
                        ANGKA KREDIT KELULUSAN = <?= $jabatan2->perjenjang ?>
                        <br><br>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- pengajuan diterima -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $pendaftar_id, 'status' => 1])->result();
    
    if($dataRekapNilai) :
         $pendaftar = $this->db->get_where('pendaftar',['id' => $dataRekapNilai[0]->pendaftar_id])->row(); ?>
 
         <h1 class="h3 mb-4 text-gray-800">Nama Pendaftar : <?= $pendaftar->nama ?></h1>
         <hr>
        <hr class='mt-5'>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-7">
                <h1 class="h3 mb-4 text-gray-800">Hasil Pengajuan Diterima</h1>

                <?php foreach($dataRekapNilai as $rekapnilai) : ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengajuan Ke - <?= $rekapnilai->pengajuan_ke ?></h6>
                    </div>
                    <div class="card-body">
                        Kelengkapan Berkas = <?php if($rekapnilai->lengkap == 1){ echo "<span class='badge badge-success'>Lengkap</span>"; } else { echo "<span class='badge badge-danger'>Belum Lengkap</span>"; } ?> <br>
                        Status Pengajuan = <?php if($rekapnilai->status == 1){ echo "<span class='badge badge-success'>Diterima</span>"; } else { echo "<span class='badge badge-warning'>Belum Dinilai</span>"; } ?> <br>
                        Tanggal Pengajuan = <?= date('d F Y',$rekapnilai->tanggal) ?> <br>
                        <br>
                        <strong>Jabatan</strong><br>
                        <?php $jabatan = $this->db->get_where('jabatan',['id' => $rekapnilai->dari])->row(); ?>
                        Dari => <?= $jabatan->nama ?> -->> <?= $jabatan->pangkat ?> -->> <?= $jabatan->gol_ruang ?><br>

                        <?php $jabatan2 = $this->db->get_where('jabatan',['id' => $rekapnilai->dari+1])->row(); ?>
                        Mengajukan ke => <?= $jabatan2->nama ?> -->> <?= $jabatan2->pangkat ?> -->> <?= $jabatan2->gol_ruang ?><br><br>

                        <strong>Syarat Kelulusan</strong><br>
                        ANGKA KREDIT KELULUSAN = <?= $jabatan2->perjenjang ?>
                        <br><br>

                        <strong>Nilai Anda</strong><br>
                        ANGKA KREDIT KESELURUHAN = <?= $rekapnilai->hasil_akk ?>
                        <br><br>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- pengajuan  ditolak -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $pendaftar_id, 'status' => 3])->result();
    
    if($dataRekapNilai) : 
        
         $pendaftar = $this->db->get_where('pendaftar',['id' => $dataRekapNilai[0]->pendaftar_id])->row(); ?>
 
         <h1 class="h3 mb-4 text-gray-800">Nama Pendaftar : <?= $pendaftar->nama ?></h1>
        <hr class='mt-5'>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-4 text-gray-800">Hasil Pengajuan Ditolak</h1>

                <?php foreach($dataRekapNilai as $rekapnilai) : ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengajuan Ke - <?= $rekapnilai->pengajuan_ke ?></h6>
                    </div>
                    <div class="card-body">
                        Kelengkapan Berkas = <?php if($rekapnilai->lengkap == 1){ echo "<span class='badge badge-success'>Lengkap</span>"; } else { echo "<span class='badge badge-danger'>Belum Lengkap</span>"; } ?> <br>
                        Status Pengajuan = <?php if($rekapnilai->status == 2){ echo "<span class='badge badge-danger'>Ditolak</span>"; } else if($rekapnilai->status == 3){ echo "<span class='badge badge-danger'>Ditolak</span>"; }  else { echo "<span class='badge badge-warning'>Belum Dinilai</span>"; } ?> <br>
                        Tanggal Pengajuan = <?= date('d F Y',$rekapnilai->tanggal) ?> <br>
                        <br>
                        <strong>Jabatan</strong><br>
                        <?php $jabatan = $this->db->get_where('jabatan',['id' => $rekapnilai->dari])->row(); ?>
                        Dari => <?= $jabatan->nama ?> -->> <?= $jabatan->pangkat ?> -->> <?= $jabatan->gol_ruang ?><br>

                        <?php $jabatan2 = $this->db->get_where('jabatan',['id' => $rekapnilai->dari+1])->row(); ?>
                        Mengajukan ke => <?= $jabatan2->nama ?> -->> <?= $jabatan2->pangkat ?> -->> <?= $jabatan2->gol_ruang ?><br><br>

                        <strong>Syarat Kelulusan</strong><br>
                        ANGKA KREDIT KELULUSAN = <?= $jabatan2->perjenjang ?>
                        <br><br>

                        <strong>Nilai Anda</strong><br>
                        ANGKA KREDIT KESELURUHAN = <?= $rekapnilai->hasil_akk ?>
                        <br><br>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->