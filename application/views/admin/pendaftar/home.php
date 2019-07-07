<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pendaftar</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pendaftar</h6>
    </div>
    <div class="card-body">

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Pendaftar <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>
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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>JK</th>
                    <th>Status</th>
                    <th>Telepon</th>
                    <th>Alamat Sekolah</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($pendaftar as  $p) : ?>
                        <tr>
                            <td><?= $p->nip; ?></td>
                            <td><?= $p->nama; ?></td>
                            <td><?= $p->tmp_lahir.', '.$p->tgl_lahir; ?></td>
                            <td><?= $p->jenis_kelamin; ?></td>
                            <td><?= $p->status_guru; ?></td>
                            <td><?= $p->telepon; ?></td>
                            <td><?= $p->alamat_sekolah; ?></td>
                            <td>
                                <a href="<?= base_url('admin/pendaftar/hapus/'.$p->id) ?>" onclick="return confirm('Hapus?');" class="badge badge-danger float-right tombol-hapus mb-1">Hapus</a>
                                <a href="<?= base_url('admin/pendaftar/edit/'.$p->id) ?>" class="badge badge-info float-right mr-1 mb-1">Edit</a>
                                <a href="<?= base_url('admin/pendaftar/detail/'.$p->id) ?>" class="badge badge-success float-right mr-1">Detail</a>
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