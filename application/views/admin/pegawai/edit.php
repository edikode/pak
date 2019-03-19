<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h1>
    <div class="row mb-5">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Pegawai
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $pegawai->id; ?>" >
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" autocomplete="off" value="<?= set_value('nip') ? set_value('nip') : $pegawai->nip; ?>">
                            <?= form_error('nip','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autocomplete="off" value="<?= set_value('nama') ? set_value('nama') : $pegawai->nama; ?>">
                            <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" name="tmp_lahir" autocomplete="off" value="<?= set_value('tmp_lahir') ? set_value('tmp_lahir') : $pegawai->tmp_lahir; ?>">
                                    <?= form_error('tmp_lahir','<small class="text-danger">','</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" autocomplete="off" value="<?= set_value('tgl_lahir') ? set_value('tgl_lahir') : $pegawai->tgl_lahir; ?>">
                                    <?= form_error('tgl_lahir','<small class="text-danger">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" <?php if($pegawai->jenis_kelamin == 'L') echo "checked";  ?>>
                                <label class="form-check-label" for="L">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P" <?php if($pegawai->jenis_kelamin == 'P') echo "checked";  ?>>
                                <label class="form-check-label" for="P">
                                    Perempuan
                                </label>
                            </div>
                            <?= form_error('jenis_kelamin','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="">-- Pilih --</option>
                                <?php foreach($status as $s) : ?>
                                    <?php if($pegawai->status == $s) : ?>
                                        <option value="<?= $s ?>" selected><?= $s ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s ?>"><?= $s ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('status') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" class="form-control" id="jabatan">
                                <option value="">-- Pilih --</option>
                                <?php foreach($jabatan as $j) : ?>
                                    <?php if($pegawai->jabatan == $j) : ?>
                                        <option value="<?= $j ?>" selected><?= $j ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j ?>"><?= $j ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('jabatan') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control" id="agama">
                                <option value="">-- Pilih --</option>
                                <?php foreach($agama as $a) : ?>
                                    <?php if($pegawai->agama == $a) : ?>
                                        <option value="<?= $a ?>" selected><?= $a ?></option>
                                    <?php else : ?>
                                        <option value="<?= $a ?>"><?= $a ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('agama') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" autocomplete="off" value="<?= set_value('telepon') ? set_value('telepon') : $pegawai->telepon; ?>">
                            <?= form_error('telepon','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" autocomplete="off"><?= set_value('alamat') ? set_value('alamat') : $pegawai->alamat; ?></textarea>
                            <?= form_error('alamat','<small class="text-danger">','</small>'); ?>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>