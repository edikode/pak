<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Kegiatan</h1>
    <div class="row mb-5">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Kegiatan
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $kegiatan->id; ?>" >
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" placeholder="Kode" name="kode" autocomplete="off" readonly="on" value="<?= set_value('kode') ? set_value('kode') : $kegiatan->kode; ?>">
                            <?= form_error('kode','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan</label>
                            <textarea name="kegiatan" id="kegiatan" class="form-control" autocomplete="off"><?= set_value('kegiatan') ? set_value('kegiatan') : $kegiatan->kegiatan; ?></textarea>
                            <?= form_error('kegiatan','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="Satuan" name="satuan" autocomplete="off" value="<?= set_value('satuan') ? set_value('satuan') : $kegiatan->satuan; ?>">
                            <?= form_error('satuan','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="angka_kredit">Angka Kredit</label>
                            <input type="text" class="form-control" id="angka_kredit" placeholder="Angka Kredit" name="angka_kredit" autocomplete="off" value="<?= set_value('angka_kredit') ? set_value('angka_kredit') : $kegiatan->angka_kredit; ?>">
                            <?= form_error('angka_kredit','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Pelaksana</label>
                            <input type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" name="pelaksana" autocomplete="off" value="<?= set_value('pelaksana') ? set_value('pelaksana') : $kegiatan->pelaksana; ?>">
                            <?= form_error('pelaksana','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="unsur">Unsur Kegiatan</label>
                            <select name="unsur" class="form-control" id="unsur">
                                <option value="">-- Pilih --</option>
                                <?php foreach($unsur as $u) : ?>
                                    <?php if($kegiatan->unsur_id == $u->id) : ?>
                                        <option value="<?= $u->id ?>" selected><?= $u->unsur.', Sub Unsur : '.$u->sub_unsur ?></option>
                                    <?php else : ?>
                                        <option value="<?= $u->id ?>"><?= $u->unsur.', Sub Unsur : '.$u->sub_unsur ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('unsur') ?></small>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>