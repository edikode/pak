<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h1>
    <div class="row mb-5">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Pendaftar
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $pendaftar->id; ?>" >
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" autocomplete="off" readonly="on" value="<?= set_value('nip') ? set_value('nip') : $pendaftar->nip; ?>">
                            <?= form_error('nip','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autocomplete="off" value="<?= set_value('nama') ? set_value('nama') : $pendaftar->nama; ?>">
                            <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nuptk">NUPTK</label>
                            <input type="text" class="form-control" id="nuptk" placeholder="NUPTK" name="nuptk" autocomplete="off" value="<?= set_value('nuptk') ? set_value('nuptk') : $pendaftar->nuptk; ?>">
                            <?= form_error('nuptk','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="karpeg">Karpeg</label>
                            <input type="text" class="form-control" id="karpeg" placeholder="Karpeg" name="karpeg" autocomplete="off" value="<?= set_value('karpeg') ? set_value('karpeg') : $pendaftar->karpeg; ?>">
                            <?= form_error('karpeg','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" name="tmp_lahir" autocomplete="off" value="<?= set_value('tmp_lahir') ? set_value('tmp_lahir') : $pendaftar->tmp_lahir; ?>">
                            <?= form_error('tmp_lahir','<small class="text-danger">','</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" autocomplete="off" value="<?= set_value('tgl_lahir') ? set_value('tgl_lahir') : $pendaftar->tgl_lahir; ?>">
                            <?= form_error('tgl_lahir','<small class="text-danger">','</small>'); ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" <?php if($pendaftar->jenis_kelamin == 'L') echo "checked";  ?>>
                                <label class="form-check-label" for="L">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P" <?php if($pendaftar->jenis_kelamin == 'P') echo "checked";  ?>>
                                <label class="form-check-label" for="P">
                                    Perempuan
                                </label>
                            </div>
                            <?= form_error('jenis_kelamin','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control" id="agama">
                                <option value="">-- Pilih --</option>
                                <?php foreach($agama as $a) : ?>
                                    <?php if($pendaftar->agama == $a) : ?>
                                        <option value="<?= $a ?>" selected><?= $a ?></option>
                                    <?php else : ?>
                                        <option value="<?= $a ?>"><?= $a ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('agama') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="">-- Pilih --</option>
                                <?php foreach($status as $s) : ?>
                                    <?php if($pendaftar->status_guru == $s) : ?>
                                        <option value="<?= $s ?>" selected><?= $s ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s ?>"><?= $s ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('status') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tugas_mengajar">Tugas Mengajar</label>
                            <input type="text" class="form-control" id="tugas_mengajar" placeholder="Tugas Mengajar" name="tugas_mengajar" autocomplete="off" value="<?= set_value('tugas_mengajar') ? set_value('tugas_mengajar') : $pendaftar->tugas_mengajar; ?>">
                            <?= form_error('tugas_mengajar','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="unit_kerja">Unit Kerja</label>
                            <input type="text" class="form-control" id="unit_kerja" placeholder="Unit Kerja" name="unit_kerja" autocomplete="off" value="<?= set_value('unit_kerja') ? set_value('unit_kerja') : $pendaftar->unit_kerja; ?>">
                            <?= form_error('unit_kerja','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan / Pangkat</label>
                            <select name="jabatan" class="form-control" id="jabatan">
                                <option value="">-- Pilih --</option>
                                <?php $jabatan = $this->db->get('jabatan')->result(); ?>
                                <?php foreach($jabatan as $j) : ?>
                                    <?php if($pendaftar->jabatan_id == $j->id) : ?>
                                        <option value="<?= $j->id ?>" selected><?= $j->nama.' / '.$j->pangkat; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j->id ?>"><?= $j->nama.' / '.$j->pangkat; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('jabatan') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_fungsional">Jabatan Fungsional</label>
                            <select name="jabatan_fungsional" class="form-control" id="jabatan_fungsional">
                                <option value="">-- Pilih --</option>
                                <?php foreach($jabatan_fungsional as $j) : ?>
                                    <?php if($pendaftar->jabatan_fungsional == $j) : ?>
                                        <option value="<?= $j ?>" selected><?= $j ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j ?>"><?= $j ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('jabatan_fungsional') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat_rumah">Alamat Rumah</label>
                            <textarea name="alamat_rumah" id="alamat_rumah" class="form-control" autocomplete="off"><?= set_value('alamat_rumah') ? set_value('alamat_rumah') : $pendaftar->alamat_rumah; ?></textarea>
                            <?= form_error('alamat_rumah','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_sekolah">Alamat Sekolah</label>
                            <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control" autocomplete="off"><?= set_value('alamat_sekolah') ? set_value('alamat_sekolah') : $pendaftar->alamat_sekolah; ?></textarea>
                            <?= form_error('alamat_sekolah','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" autocomplete="off" value="<?= set_value('telepon') ? set_value('telepon') : $pendaftar->telepon; ?>">
                            <?= form_error('telepon','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="email" autocomplete="off" value="<?= set_value('email') ? set_value('email') : $pendaftar->email; ?>">
                            <?= form_error('email','<small class="text-danger">','</small>'); ?>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin/pendaftar') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>