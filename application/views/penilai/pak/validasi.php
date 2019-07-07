

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
                    <td style="width: 250px;">Opsi</td>
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
                    <td>
                        <a class="btn btn-warning btn-sm btn-block" href="#" data-toggle="modal" data-target="#nilai<?= $jabatan_fungsional->jenis; ?>">Nilai</a>
                    </td>
                </tr>
                
                <?php if($jabatan_fungsional->jenis == "pb") : ?>
                <!-- modal Unsur pembelajaran / BK -->
                <div class="modal fade" id="nilaipb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <form action="<?= base_url('penilai/pak/validasinilai/'.$nilai->rekap_nilai_id.'/'.$nilai->id); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nilai Unsur pembelajaran / BK</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="status">Validasi Berkas</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="valid" value="1" <?php if($nilai->status == 1){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="valid">
                                        Valid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="tidak_valid" value="2" <?php if($nilai->status == 2){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="tidak_valid">
                                        Tidak Valid
                                    </label>
                                    <?= form_error('status','<small class="text-danger">','</small>'); ?>
                                </div>
                                <br>
                                <?php $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['id' => $nilai->jabatan_fungsional_id])->row(); ?>

                                <div class="form-group">
                                    <label for="tugas_tambahan">Tugas</label>
                                    <input type="text" class="form-control" id="tugas_tambahan" placeholder="Jumlah Jam/Siswa" name="tugas_tambahan" autocomplete="off" value="<?= $jabatan_fungsional->tugas ?>" required readonly="">
                                    <?= form_error('tugas_tambahan','<small class="text-danger">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_jam">Jumlah Jam/Siswa untuk Pembelajaran atau bimbingan</label>
                                    <input type="text" class="form-control" id="jumlah_jam" placeholder="Jumlah Jam/Siswa" name="jumlah_jam" autocomplete="off" value="<?php if($nilai->jumlah_jam == 0) echo ""; else { echo set_value('jumlah_jam') ? set_value('jumlah_jam') : $nilai->jumlah_jam; } ?>" required>
                                    <?= form_error('jumlah_jam','<small class="text-danger">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Jumlah Tahun Mengajar/Membimbing</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Jumlah Tahun Mengajar/Membimbing" name="tahun" autocomplete="off" value="<?php if($nilai->tahun == 0) echo ""; else { echo set_value('tahun') ? set_value('tahun') : $nilai->tahun; } ?>" required>
                                    <?= form_error('tahun','<small class="text-danger">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Total Nilai PKG</label>
                                    <input type="text" class="form-control" id="nilai" placeholder="Total Nilai PKG" name="nilai" autocomplete="off" value="<?php if($nilai->nilai == 0) echo ""; else { echo set_value('nilai') ? set_value('nilai') : $nilai->nilai; } ?>" required>
                                    <?= form_error('nilai','<small class="text-danger">','</small>'); ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

                <?php elseif($jabatan_fungsional->jenis == "ttmj") : ?>
                <!-- modal Tugas tambahan mengurangi jam -->
                <div class="modal fade" id="nilaittmj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <form action="<?= base_url('penilai/pak/validasinilai/'.$nilai->rekap_nilai_id.'/'.$nilai->id); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nilai Tugas Tambahan Mengurangi Jam</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="status">Validasi Berkas</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="valid" value="1" <?php if($nilai->status == 1){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="valid">
                                        Valid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="tidak_valid" value="2" <?php if($nilai->status == 2){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="tidak_valid">
                                        Tidak Valid
                                    </label>
                                    <?= form_error('status','<small class="text-danger">','</small>'); ?>
                                </div>
                                <br>
                                <?php $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['id' => $nilai->jabatan_fungsional_id])->row(); ?>

                                <div class="form-group">
                                    <label for="tugas_tambahan">Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="tugas_tambahan" placeholder="Jumlah Jam/Siswa" name="tugas_tambahan" autocomplete="off" value="<?= $jabatan_fungsional->tugas ?>" required readonly="">
                                    <?= form_error('tugas_tambahan','<small class="text-danger">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Jumlah Tahun Bertugas</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Jumlah Tahun Bertugas" name="tahun" autocomplete="off" value="<?php if($nilai->tahun == 0) echo ""; else { echo set_value('tahun') ? set_value('tahun') : $nilai->tahun; } ?>" required>
                                    <?= form_error('tahun','<small class="text-danger">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Total Nilai PKG</label>
                                    <input type="text" class="form-control" id="nilai" placeholder="Total Nilai PKG" name="nilai" autocomplete="off" value="<?php if($nilai->nilai == 0) echo ""; else { echo set_value('nilai') ? set_value('nilai') : $nilai->nilai; } ?>" required>
                                    <?= form_error('nilai','<small class="text-danger">','</small>'); ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
                
                <?php elseif($jabatan_fungsional->jenis == "tttmj") : ?>
                <!-- modal Tugas tambahan mengurangi jam -->
                <div class="modal fade" id="nilaitttmj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <form action="<?= base_url('penilai/pak/validasinilai/'.$nilai->rekap_nilai_id.'/'.$nilai->id); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nilai Penugasan 1 Tahun</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="status">Validasi Berkas</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="valid" value="1" <?php if($nilai->status == 1){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="valid">
                                        Valid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="tidak_valid" value="2" <?php if($nilai->status == 2){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="tidak_valid">
                                        Tidak Valid
                                    </label>
                                    <?= form_error('status','<small class="text-danger">','</small>'); ?>
                                </div>
                                <br>
                                <?php $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['id' => $nilai->jabatan_fungsional_id])->row(); ?>

                                <div class="form-group">
                                    <label for="tugas_tambahan">Penugasan 1 Tahun</label>
                                    <input type="text" class="form-control" id="tugas_tambahan" placeholder="Jumlah Jam/Siswa" name="tugas_tambahan" autocomplete="off" value="<?= $jabatan_fungsional->tugas ?>" required readonly="">
                                    <?= form_error('tugas_tambahan','<small class="text-danger">','</small>'); ?>
                                </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

                <?php elseif($jabatan_fungsional->jenis == "pkdt") : ?>
                <!-- modal Tugas tambahan mengurangi jam -->
                <div class="modal fade" id="nilaipkdt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <form action="<?= base_url('penilai/pak/validasinilai/'.$nilai->rekap_nilai_id.'/'.$nilai->id); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nilai Penugasan Kurang dari 1 Tahun</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="status">Validasi Berkas</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="valid" value="1" <?php if($nilai->status == 1){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="valid">
                                        Valid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="tidak_valid" value="2" <?php if($nilai->status == 2){ echo "checked"; }?> required>
                                    <label class="form-check-label" for="tidak_valid">
                                        Tidak Valid
                                    </label>
                                    <?= form_error('status','<small class="text-danger">','</small>'); ?>
                                </div>
                                <br>
                                <?php $jabatan_fungsional = $this->db->get_where('jabatan_fungsional',['id' => $nilai->jabatan_fungsional_id])->row(); ?>

                                <div class="form-group">
                                    <label for="tugas_tambahan">Penugasan Kurang dari 1 Tahun</label>
                                    <input type="text" class="form-control" id="tugas_tambahan" placeholder="Jumlah Jam/Siswa" name="tugas_tambahan" autocomplete="off" value="<?= $jabatan_fungsional->tugas ?>" required readonly="">
                                    <?= form_error('tugas_tambahan','<small class="text-danger">','</small>'); ?>
                                </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>


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
                        <td>
                            <a class="btn btn-warning btn-sm btn-block" href="#" data-toggle="modal" data-target="#nilai<?= $k->nilai_id ?>">Nilai</a>
                        </td>
                    </tr> 

                    <div class="modal fade" id="nilai<?= $k->nilai_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="form2" action="<?= base_url('penilai/pak/lakukanvalidasi/'.$k->nilai_id); ?>" method="post" multipart>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nilai Berkas</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="rekap_nilai_id" value="<?= $k->rekap_nilai_id ?>">

                                        <label for="status">Validasi Berkas</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="valid" value="1" <?php if($k->status == 1){ echo "checked"; }?> required>
                                            <label class="form-check-label" for="valid">
                                                Valid
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="tidak_valid" value="2" <?php if($k->status == 2){ echo "checked"; }?> required>
                                            <label class="form-check-label" for="tidak_valid">
                                                Tidak Valid
                                            </label>
                                            <?= form_error('status','<small class="text-danger">','</small>'); ?>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="alasan">Alasan</label>
                                            <textarea name="alasan" id="alasan" class="form-control"><?= $k->alasan ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="saran">Saran</label>
                                            <textarea name="saran" id="saran" class="form-control"><?= $k->saran ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                <?php
                } endforeach; ?>
            </tbody>
        </table>

        <form action="<?= base_url('penilai/pak/ceksemuavalidasi/'.$k->rekap_nilai_id); ?>" method="post">
            <button type="submit" name="simpan" class="btn btn-primary">Berikutnya</button>
            <a href="<?= base_url('penilai/pak/') ?>" class="btn btn-secondary">Kembali</a>
        </form>

        <br><br>
    

</div>
<!-- /.container-fluid -->