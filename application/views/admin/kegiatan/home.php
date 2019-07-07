<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kegiatan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    Data Kegiatan <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Kode</th>
                <th>Kegiatan</th>
                <th>Satuan</th>
                <th>Angka Kredit</th>
                <th>Pelaksana</th>
                <th>Unsur</th>
                <th>Sub Unsur</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($kegiatan as  $k) : ?>
                    <tr>
                        <td><?= $k->kode; ?></td>
                        <td><?= $k->kegiatan; ?></td>
                        <td><?= $k->satuan; ?></td>
                        <td><?= $k->angka_kredit; ?></td>
                        <td><?= $k->pelaksana; ?></td>
                        <td><?= $k->unsur; ?></td>
                        <td><?= $k->sub_unsur; ?></td>
                        <td>
                            <a href="<?= base_url('admin/kegiatan/hapus/'.$k->id) ?>" onclick="return confirm('Hapus?');" class="badge badge-danger float-right tombol-hapus mb-1">Hapus</a>
                            <a href="<?= base_url('admin/kegiatan/edit/'.$k->id) ?>" class="badge badge-info float-right mr-1 mb-1">Edit</a>
                            <a href="<?= base_url('admin/kegiatan/detail/'.$k->id) ?>" class="badge badge-success float-right mr-1">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->