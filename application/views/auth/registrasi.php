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
