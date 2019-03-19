<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Pengguna</h1>
    <div class="row mb-5">
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Pengguna
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="pegawai">Pegawai</label>
                            <select name="pegawai" class="form-control" id="pegawai">
                                <option value="">-- Pilih --</option>
                                <?php foreach($pegawai as $p) : 
                                        if($this->db->get_where('user',['pegawai_id' => $p->id])->row()){
                                            continue;
                                        }                                    
                                    ?>
                                    <?php if(set_value('pegawai') == $p->id) : ?>
                                        <option value="<?= $p->id ?>" selected><?= $p->nama ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('pegawai') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="">-- Pilih --</option>
                                <?php foreach($role as $r) : ?>
                                    <?php if(set_value('role') == $r->id) : ?>
                                        <option value="<?= $r->id ?>" selected><?= $r->nama ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('role') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off" value="<?= set_value('username'); ?>">
                            <?= form_error('username','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="off" value="">
                                    <?= form_error('password','<small class="text-danger">','</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password2">Ulangi Password</label>
                                    <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2" autocomplete="off" value="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>