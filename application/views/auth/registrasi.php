<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi PAK</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registrasi User Baru</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autocomplete="off" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" autocomplete="off" value="<?= set_value('nip'); ?>">
                        <?= form_error('nip','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" class="form-control" id="nuptk" placeholder="NUPTK" name="nuptk" autocomplete="off" value="<?= set_value('nuptk'); ?>">
                        <?= form_error('nuptk','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="karpeg">Karpeg</label>
                        <input type="text" class="form-control" id="karpeg" placeholder="Karpeg" name="karpeg" autocomplete="off" value="<?= set_value('karpeg'); ?>">
                        <?= form_error('karpeg','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tmp_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" name="tmp_lahir" autocomplete="off" value="<?= set_value('tmp_lahir'); ?>">
                          <?= form_error('tmp_lahir','<small class="text-danger">','</small>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tgl_lahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" autocomplete="off" value="<?= set_value('tgl_lahir'); ?>">
                          <?= form_error('tgl_lahir','<small class="text-danger">','</small>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" <?php if(set_value('jenis_kelamin') == 'L') echo "checked";  ?>>
                          <label class="form-check-label" for="L">
                              Laki-Laki
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P" <?php if(set_value('jenis_kelamin') == 'P') echo "checked";  ?>>
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
                                <?php if(set_value('agama') == $a) : ?>
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
                                <?php if(set_value('status') == $s) : ?>
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
                        <input type="text" class="form-control" id="tugas_mengajar" placeholder="Tugas Mengajar" name="tugas_mengajar" autocomplete="off" value="<?= set_value('tugas_mengajar'); ?>">
                        <?= form_error('tugas_mengajar','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja</label>
                        <input type="text" class="form-control" id="unit_kerja" placeholder="Unit Kerja" name="unit_kerja" autocomplete="off" value="<?= set_value('unit_kerja'); ?>">
                        <?= form_error('unit_kerja','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan / Pangkat</label>
                        <select name="jabatan" class="form-control" id="jabatan">
                            <option value="">-- Pilih --</option>
                            <?php foreach($jabatan as $j) : ?>
                                <?php if(set_value('jabatan') == $j->id) : ?>
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
                                <?php if(set_value('jabatan_fungsional') == $j) : ?>
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
                        <textarea name="alamat_rumah" id="alamat_rumah" class="form-control" autocomplete="off"><?= set_value('alamat_rumah'); ?></textarea>
                        <?= form_error('alamat_rumah','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control" autocomplete="off"><?= set_value('alamat_sekolah'); ?></textarea>
                        <?= form_error('alamat_sekolah','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" autocomplete="off" value="<?= set_value('telepon'); ?>">
                        <?= form_error('telepon','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="email" name="email" autocomplete="off" value="<?= set_value('email'); ?>">
                        <?= form_error('email','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off" value="<?= set_value('username'); ?>">
                        <?= form_error('username','<small class="text-danger">','</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" placeholder="Password" name="password1" autocomplete="off">
                            <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <label for="password2">Ulangi Password</label>
                            <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    Registrasi
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Login!</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
