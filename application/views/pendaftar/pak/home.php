<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    // jika status 0 maka pengajuan belum di nilai
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $this->session->userdata('id'), 'status' => 0])->row();
    ?>

    <?php if($dataRekapNilai) : ?>
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

            <?php redirect('pendaftar/pak/upload/'.$dataRekapNilai->id); ?>

        <?php endif; ?>

    <?php else : ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Penilaian Angka Kredit (PAK)</h1>

    <!-- pengajuan sudah dinilai -->
    <!-- button pengajuan akan muncul jika waktu pengajuan sebelumnya sudah 3 tahun -->
    <a href="<?= base_url('pendaftar/pak/pengajuan'); ?>" class="btn btn-primary btn-icon-split btn-lg">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>
        <span class="text">Pengajuan</span>
    </a>
    <?php endif; ?>

    <!-- berkas ada yg ditolak -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $this->session->userdata('id'), 'status' => 2])->result();
    ?>
    <?php if($dataRekapNilai) : ?>
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

                        <a href="<?= base_url('pendaftar/pak/upload/'.$rekapnilai->id); ?>" class="btn btn-primary">Cek Berkas</a>
                        <a href="<?= base_url('pendaftar/pak/cetaklaporan/'.$rekapnilai->id); ?>"  target="_blank" class="btn btn-success">Cetak Laporan Hasil</a>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- pengajuan diterima -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $this->session->userdata('id'), 'status' => 1])->result();
    ?>
    <?php if($dataRekapNilai) : ?>
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

                        <a href="<?= base_url('pendaftar/pak/cetaklaporan/'.$rekapnilai->id); ?>" class="btn btn-success" target="_blank">Cetak Laporan Hasil</a>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- pengajuan  ditolak -->
    <?php
    $dataRekapNilai = $this->db->get_where('rekap_nilai',['pendaftar_id' => $this->session->userdata('id'), 'status' => 3])->result();
    ?>
    <?php if($dataRekapNilai) : ?>
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

                        <a href="<?= base_url('pendaftar/pak/cetaklaporan/'.$rekapnilai->id); ?>" class="btn btn-success" target="_blank">Cetak Laporan Hasil</a>
                    </div>
                </div>
            <?php endforeach;  ?>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->