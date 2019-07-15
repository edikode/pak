<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Selamat datang di Aplikasi PENILAIAN ANGKA KREDIT (PAK)</h1>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <table style="font-size:18px">
                                <tr>
                                    <td>NIP</td>
                                    <td>: <?= $pendaftar->nip ?></td>
                                </tr>
                                <tr>
                                    <td>NUPTK</td>
                                    <td>: <?= $pendaftar->nuptk ?></td>
                                </tr>
                                <tr>
                                    <td>KARPEG</td>
                                    <td>: <?= $pendaftar->karpeg ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $pendaftar->nama ?></td>
                                </tr>
                                <tr>
                                    <td>TTL</td>
                                    <td>: <?= $pendaftar->tmp_lahir.', '.$pendaftar->tgl_lahir ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $pendaftar->jenis_kelamin ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>: <?= $pendaftar->agama ?></td>
                                </tr>
                                <tr>
                                    <td>Status Guru</td>
                                    <td>: <?= $pendaftar->status_guru ?></td>
                                </tr>
                                <tr>
                                    <td>Tugas Mengajar</td>
                                    <td>: <?= $pendaftar->tugas_mengajar ?></td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td>: <?= $pendaftar->unit_kerja ?></td>
                                </tr>

                                <?php $jabatan = $this->db->get_where('jabatan',['id' => $pendaftar->jabatan_id])->row(); ?>

                                <tr>
                                    <td>Jabatan</td>
                                    <td>: <?= $jabatan->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Pangkat</td>
                                    <td>: <?= $jabatan->pangkat ?></td>
                                </tr>
                                <tr>
                                    <td>Gol Ruang</td>
                                    <td>: <?= $jabatan->gol_ruang ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Rumah</td>
                                    <td>: <?= $pendaftar->alamat_rumah ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Sekolah</td>
                                    <td>: <?= $pendaftar->alamat_sekolah ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>: <?= $pendaftar->telepon ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?= $pendaftar->email ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <?php $datagambar = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row() ?>
                            
                            <img src="<?= base_url('assets/img/'.$datagambar->gambar); ?>" class="card-img" alt="<?= $this->session->userdata('nama'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>