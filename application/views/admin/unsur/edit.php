<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Unsur Kegiatan</h1>
    <div class="row mb-5">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Unsur Kegiatan
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $unsur->id; ?>" >
                        <div class="form-group">
                            <label for="unsur">Unsur Kegiatan</label>
                            <select name="unsur" class="form-control" id="unsur">
                                <option value="">-- Pilih --</option>
                                <?php foreach($dataSelect as $dataUnsur) : ?>
                                    <?php if($unsur->unsur == $dataUnsur) : ?>
                                        <option value="<?= $dataUnsur ?>" selected><?= $dataUnsur ?></option>
                                    <?php else : ?>
                                        <option value="<?= $dataUnsur ?>"><?= $dataUnsur ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('unsur') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="sub_unsur">Sub Unsur Kegiatan</label>
                            <textarea name="sub_unsur" id="sub_unsur" class="form-control" autocomplete="off"><?= set_value('sub_unsur') ? set_value('sub_unsur') : $unsur->sub_unsur; ?></textarea>
                            <?= form_error('sub_unsur','<small class="text-danger">','</small>'); ?>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin/unsur') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>