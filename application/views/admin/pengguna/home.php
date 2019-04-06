<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/pengguna/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Pengguna <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>
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
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($pengguna as  $p) : 
                    $dataPengguna = $this->db->get_where('pegawai',['id' => $p->pegawai_id])->row();
                    if(!$dataPengguna){
                        $dataPengguna = $this->db->get_where('pendaftar',['id' => $p->pendaftar_id])->row();
                    }
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $dataPengguna->nama; ?></td>
                        <td><?= $p->username; ?></td>
                        <td><?= $p->level; ?></td>
                        <td><?php if($p->is_active == 1) echo "Aktif"; else echo "Tidak Aktif"; ?></td>
                        <td>
                            <a href="<?= base_url('admin/pengguna/hapus/'.$p->id) ?>" onclick="return confirm('Hapus?');" class="badge badge-danger float-right tombol-hapus mb-1">Hapus</a>
                            <a href="<?= base_url('admin/pengguna/detail/'.$p->id) ?>" class="badge badge-success float-right mr-1">Detail</a>
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