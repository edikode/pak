<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Upload Berkas Pengajuan</h1>

        <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(isset($error)) : ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $error ?>
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
                    <td style="width:250px">Upload Berkas</td>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td colspan="4">
                        Unsur Utama Pendidikan
                    </td>
                </tr>



                <?php
                $user = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();

                
                foreach($kegiatan as $k): ?>
                <tr>
                    <td><?= $k->unsur; ?></td>
                    <td><?= $k->sub_unsur; ?></td>
                    <td><?= $k->kegiatan; ?></td>

                    <td>
                        <?php if($k->file == "") : ?>
                        <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">        
                            <input type="hidden" name="nilai_id" value="<?= $k->id ?>">

                            <input type="text" placeholder="Tulis Judul berkas ..." name="judul" value="<?= $k->judul ?>" class="form-control mb-2" required>
                            <input type="file" class="gambar" name="file" data-id="<?= $k->id ?>">
                            
                            <!-- <button type="submit" name="simpan">Upload</button> -->
                        </form>
                        <?php else : ?>
                        
                            <?php if($k->status == 2): ?>
                            <div class='alert alert-warning'>Berkas Sebelumnya tidak valid, Upload ulang...</div>

                            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">        
                                <input type="hidden" name="nilai_id" value="<?= $k->id ?>">
                                
                                <input type="text" placeholder="Tulis Judul berkas ..." name="judul" value="<?= $k->judul ?>" class="form-control mb-2" required>
                                <input type="file" class="gambar" name="file" data-id="<?= $k->id ?>">
                            </form>

                            <?php else : ?>
                            <div class="mb-2">Judul Berkas: <?= $k->judul ?></div>
                            <a href="<?= base_url('uploads/'.$k->file); ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a>

                            <?php endif ?>

                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="<?= base_url('pendaftar/pak/cek_berkas/'.$rekap_nilai_id) ?>" method="post">
            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
        </form>
    

</div>
<!-- /.container-fluid -->