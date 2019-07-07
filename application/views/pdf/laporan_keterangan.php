<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Hasil Penilaian Kinerja Guru</title>

    <style>
	* {
	    box-sizing: border-box;
	    font-family: Arial, Helvetica, sans-serif;
	}
	body {
	  margin: 0;
	  font-family: Arial, Helvetica, sans-serif;
	}

    /*design table 1*/
    /* .apik {
        font-family: sans-serif;
        color: #232323;
        border-collapse: collapse;
    }
    
    .apik, th, td {
        border: 1px solid #999;
        padding: 8px 20px;
    } */
	</style>

</head>
<body>
    
    <table>
        <tr>
            <td valign="top">
                <img src="<?= $_SERVER["DOCUMENT_ROOT"].'/pak/assets/img/logodinas.png' ?>" alt="" width="10%"  >
            </td>
            <td>
                <div style="text-align:center; margin-left:20px">
                    <h3 style="margin-top:0px; margin-botom:0px;">PEMERINTAH KABUPATEN BANYUWANGI</h3>
                    <h2 style="margin-top:-20px; margin-botom:0px;">DINAS PENDIDIKAN</h2>
                    <p align="center" style="margin-top:-20px;">
                        Jalan KH. Agus Salim No. 5 Telp. (0333) 424680 Fax (0333) 429080 <br>
                        website : pendidikan.banyuwangikab.go.id email : dispendik@banyuwangikab.go.id
                    </p>
                    <h3 style="margin-top:-15px; margin-botom:0px;">BANYUWANGI - 68418</h3>
                </div>
            </td>
        </tr>
    </table>
    
    <hr style="margin-top:-20px; weight:600">
    <br><br>
	<table style="color: #232323;
        border-collapse: collapse; width:100%">
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>No</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Sub Unsur yang dinilai</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Jenis Dokumen/Judul</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Alasan Belum Memenuhi Syarat</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Saran</b></td>
        </tr style="border: 1px solid #999;">
        <?php 
        $no = 1;
        // var_dump($kegiatan); die;
        foreach($kegiatan as $d) {
            if($d->alasan == ""){
                continue;
            }
            ?>
            <tr style="border: 1px solid #999;">
                <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                    <?= $no++; ?>
                </td>
                <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                    <?= $d->sub_unsur; ?>
                </td>
                <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                    <?= $d->judul; ?>
                </td>
                <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                    <?= $d->alasan; ?>
                </td>
                <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                    <?= $d->saran; ?>
                </td>
            </tr>
        <?php }
            if($no == 1) : ?>

            <tr>
                <td colspan="5" style="border: 1px solid #999;padding:10px;font-family: times-new-roman;font-size:13px;text-align:center">Data Kosong</td>
            </tr>
            <?php
            endif;
        ?>
    </table>

</body>
</html>