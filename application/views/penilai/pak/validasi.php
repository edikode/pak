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
                    <td>Berkas</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td colspan="5">
                        Unsur Utama Pendidikan
                    </td>
                </tr>

                <?php
                $user = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();

                foreach($kegiatan as $k):  ?>
                
                <tr>
                    <td><?= $k->unsur; ?></td>
                    <td><?= $k->sub_unsur; ?></td>
                    <td><?= $k->kegiatan; ?></td>
                    <td><a href="<?= base_url('uploads/'.$k->file); ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a></td>
                    <td>
                        <form action="" method="post" multipart>
                            <div class="form-check">
                                <input class="form-check-input cek-validasi" type="radio" name="<?= $k->id ?>" id="<?= $k->kegiatan ?>valid" value="1" data-id="<?= $k->id; ?>" data-validasi="1" data-rekapid="<?= $k->rekap_nilai_id; ?>" <?php if($k->status == 1){ echo "checked"; }?>>
                                <label class="form-check-label" for="<?= $k->kegiatan ?>valid">
                                    Valid
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input cek-validasi" type="radio" name="<?= $k->id ?>" id="<?= $k->kegiatan ?>tidak" value="2" data-id="<?= $k->id; ?>" data-validasi="2" data-rekapid="<?= $k->rekap_nilai_id; ?>" <?php if($k->status == 2){ echo "checked"; }?>>
                                <label class="form-check-label" for="<?= $k->kegiatan ?>tidak">
                                    Tidak Valid
                                </label>
                            </div>
                        </form>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="<?= base_url('penilai/pak/ceksemuavalidasi/'.$k->rekap_nilai_id); ?>" method="post">
            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
            <a href="<?= base_url('penilai/pak') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    

</div>
<!-- /.container-fluid -->