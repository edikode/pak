<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Pengajuan</h1>

    <form action="" method="post">
        <?php $user = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row(); ?>

        <input type="hidden" name="pendaftar_id" value="<?= $user->pendaftar_id ?>">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <td>Unsur</td>
                    <td>Sub Unsur Penilaian</td>
                    <td>Butir Kegiatan</td>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td colspan="3">
                        Unsur Utama Pendidikan
                    </td>
                </tr>

                <?php

                foreach($kegiatan as $k): ?>
                
                <tr>
                    <td><?= $k->unsur; ?></td>
                    <td><?= $k->sub_unsur; ?></td>
                    <?php
                    $unsur = $this->db->get_where('kegiatan', ['unsur_id' => $k->unsur_id]);
                    $dataUnsur = $unsur->result();

                    if($unsur->num_rows() > 1): ?>
                        <td>
                            <?php foreach($dataUnsur as $d):

                                $id_rekap = $this->uri->segment('4');

                                $cekkegiatan = $this->db->get_where('nilai',['kegiatan_id' => $d->id, 'rekap_nilai_id' => $id_rekap])->row();
                                
                                if($cekkegiatan){
                                    $checked = "checked";
                                } else {
                                    $checked = "";
                                }

                                if($d->unsur_id == 1) : ?>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kegiatan_id[]" id="<?= $d->kegiatan ?>" value="<?= $d->id ?>" <?= $checked ?>>
                                    <label class="form-check-label" for="<?= $d->kegiatan ?>">
                                        <?= $d->kegiatan ?>
                                    </label>
                                </div>
                                
                                <?php else : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kegiatan_id[]" id="<?= $d->kegiatan ?>" value="<?= $d->id ?>" <?= $checked ?>>
                                    <label class="form-check-label" for="<?= $d->kegiatan ?>">
                                        <?= $d->kegiatan ?>
                                    </label>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    <?php else : 
                        
                        $id_rekap = $this->uri->segment('4');

                        $cekkegiatan = $this->db->get_where('nilai',['kegiatan_id' => $k->id, 'rekap_nilai_id' => $id_rekap])->row();

                        if($cekkegiatan){
                            $checked = "checked";
                        } else {
                            $checked = "";
                        }
                        
                        ?>
                       <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kegiatan_id[]" id="<?= $k->kegiatan ?>" value="<?= $k->id ?>" <?= $checked ?>>
                                <label class="form-check-label" for="<?= $k->kegiatan ?>">
                                    <?= $k->kegiatan ?>
                                </label>
                            </div>
                       </td>
                    <?php endif; ?>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('pendaftar/pak') ?>" class="btn btn-secondary">Kembali</a>
    </form>

</div>
<!-- /.container-fluid -->