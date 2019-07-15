<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Pengajuan PAK</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="<?= base_url('pendaftar/pak/pengajuan'); ?>" class="btn btn-primary"> Tambah Pengajuan </a>
            <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Pengajuan PAK</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>Pengajuan Ke</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Validasi</th>
                        <th>Jumlah AK</th>
                        <th>Status</th>
                        <th>Alamat Sekolah</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($rekap_nilai as  $r) :  ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $r->nama; ?></td>
                                <td align="center"><?= $r->pengajuan_ke; ?></td>
                                <td><?= date('d-m-Y',$r->tanggal) ?></td>
                                <td><?php if($r->tanggal_validasi != 0){ echo date('d-m-Y',$r->tanggal_validasi); } ?></td>
                                <td><?= $r->hasil_akk ?></td>
                                <td><?php 
                                    if($r->status == 0){ 
                                        echo "<span class='badge badge-danger'>Belum divalidasi</span>"; 
                                    } elseif($r->status == 1) { 
                                        echo "<span class='badge badge-success'>Data valid semua</span>"; 
                                    }  elseif($r->status == 3) { 
                                        echo "<span class='badge badge-danger'>Data Pengajuan Ditolak</span>"; 
                                    } else { 
                                        echo "<span class='badge badge-warning'>Data ada yg belum valid</span>"; 
                                    } ?>
                                </td>
                                <td><?= $r->alamat_sekolah; ?></td>
                                <td>
                                <a href="<?= base_url('pendaftar/pak/upload/'.$r->id) ?>" class="badge badge-info float-right mr-1 mb-1">Detail</a>
                                <a href="<?= base_url('pendaftar/pak/cetaklaporan/'.$r->id) ?>" class="badge badge-warning float-right mr-1" target="_blank">Cetak</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>