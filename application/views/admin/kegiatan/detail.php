<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Kegiatan</h1>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $kegiatan->kegiatan ?></h5>
                    <p class="card-text">
                        Kode : <?= $kegiatan->kode; ?> <br>
                        Kegiatan : <?= $kegiatan->kegiatan; ?> <br>
                        Satuan : <?= $kegiatan->satuan; ?> <br>
                        Angka Kredit : <?= $kegiatan->angka_kredit; ?> <br>
                        Pelaksana : <?= $kegiatan->pelaksana; ?> <br>
                        Unsur : <?= $kegiatan->unsur; ?> <br>
                        Sub Unsur : <?= $kegiatan->sub_unsur; ?> <br>
                    </p>
                    <a href="<?= base_url('admin/kegiatan') ?>" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>    