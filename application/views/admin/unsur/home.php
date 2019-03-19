<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Unsur Kegiatan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/unsur/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Unsur Kegiatan <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>
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
                <th>No</th>
                <th>Unsur</th>
                <th>Sub Unsur</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($unsur as  $u) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $u->unsur; ?></td>
                        <td><?= $u->sub_unsur; ?></td>
                        <td>
                            <a href="<?= base_url('admin/unsur/hapus/'.$u->id) ?>" onclick="return confirm('Hapus?');" class="badge badge-danger float-right tombol-hapus">Hapus</a>
                            <a href="<?= base_url('admin/unsur/edit/'.$u->id) ?>" class="badge badge-info float-right mr-1">Edit</a>
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