

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Validasi PAK</h1>

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('flash') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
   
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <td>Unsur</td>
                    <td>Sub Unsur Penilaian</td>
                    <td>Butir Kegiatan</td>
                    <td>Status</td>
                    <td>Berkas</td>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td colspan="6">
                        Unsur Utama Pendidikan
                    </td>
                </tr>

                <?php
                foreach($kegiatan as $k):
                
                $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['kegiatan_id' => $k->kegiatan_id])->row();

                if($jabatan_fungsional){ 
                    
                    $nilai = $this->db->get_where('nilai',['id' => $k->nilai_id])->row();

                    ?>
                    <!-- Ini untuk PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU -->
                <tr>
                    <td><?= $k->unsur; ?></td>
                    <td><?= $k->sub_unsur; ?></td>
                    <td><?= $k->kegiatan; ?></td>
                    <td><?php if($k->status == 1) : ?>
                        <span class="badge badge-success">
                            Sudah divalidasi
                        </span>
                        <?php elseif($k->status == 2) : ?>
                        <span class="badge badge-danger">
                            Tidak valid
                        </span>
                        <?php else : ?>
                        <span class="badge badge-warning">
                            Belum divalidasi
                        </span>
                        <?php endif ?>
                    </td>
                    <td><a href="<?= base_url('uploads/'.$k->file); ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a></td>
                </tr>
                
                <?php } else { ?>

                <!-- Ini selain PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU -->
                    <tr>
                        <td><?= $k->unsur; ?></td>
                        <td><?= $k->sub_unsur; ?></td>
                        <td><?= $k->kegiatan; ?></td>
                        <td><?php if($k->status == 1) : ?>
                            <span class="badge badge-success">
                                Sudah divalidasi
                            </span>
                            <?php elseif($k->status == 2) : ?>
                            <span class="badge badge-danger">
                                Tidak valid
                            </span>
                            <?php else : ?>
                            <span class="badge badge-warning">
                                Belum divalidasi
                            </span>
                            <?php endif ?>
                        </td>
                        <td><a href="<?= base_url('uploads/'.$k->file); ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a></td>
                    </tr> 

                <?php
                } endforeach; ?>
            </tbody>
        </table>

        <a href="<?= base_url('admin/pak/') ?>" class="btn btn-secondary">Kembali</a>

        <br><br>
    

</div>
<!-- /.container-fluid -->