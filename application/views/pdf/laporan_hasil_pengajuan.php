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
	    font-family: times-new-roman;
	}
	body {
	  margin: 0;
	  font-family: times-new-roman;
      font-size: 14px;
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
                    <h2 style="margin-top:0px; margin-botom:0px;">PEMERINTAH KABUPATEN BANYUWANGI</h2>
                    <h1 style="margin-top:-20px; margin-botom:0px;">DINAS PENDIDIKAN</h1>
                    <p align="center" style="margin-top:-20px;font-size:16px">
                        Jalan KH. Agus Salim No. 5 Telp. (0333) 424680 Fax (0333) 429080 <br>
                        website : pendidikan.banyuwangikab.go.id email : dispendik@banyuwangikab.go.id
                    </p>
                    <h2 style="margin-top:-15px; margin-botom:0px;">BANYUWANGI - 68418</h2>
                </div>
            </td>
        </tr>
    </table>
    
    <hr style="margin-top:-20px; weight:600">
    <br>

    <?php 
    $id = $this->uri->segment(4);
    $rekap_nilai = $this->db->get_where('rekap_nilai',['id' => $id])->row();
    $jabatan = $this->db->get_where('jabatan',['id' =>$pendaftar->jabatan_id])->row(); 

    // Pembelajaran/Bimbingan
    $Query_PB = $this->db->get_where('nilai',['jenis' => "pb",'rekap_nilai_id' => $id])->row();

    // Tugas Tambahan Mengurangi Jam
    $Query_TTMJ = $this->db->get_where('nilai',['jenis' => "ttmj",'rekap_nilai_id' => $id])->row();

    // TOTAL PB DAN TTMJ
    if($Query_TTMJ){
        // JIKA PUNYA TUGAS TAMBAHAN
        if($Query_TTMJ->jabatan_fungsional_id == 1){
            // JIKA KEPALA SEKOLAH, 25% AK PB 75% TUGAS TAMBAHAN
            $TOTAL_PB_TTMJ = ( (25/100 * $Query_PB->npk) + (75/100 * $Query_TTMJ->npk) ) * $Query_PB->tahun;
        } else {
            // SELAIN KEPALA SEKOLAH, 50% AK PB 50% TUGAS TAMBAHAN
            $TOTAL_PB_TTMJ = ( (50/100 * $Query_PB->npk) + (50/100 * $Query_TTMJ->npk) ) * $Query_PB->tahun;
        }
    } else {
        
        if($Query_PB){
            $TOTAL_PB_TTMJ = $Query_PB->npk * $Query_PB->tahun;

            // Tugas Tambahan penugasan 1 tahun
            $queryTTTMJ ="SELECT SUM(`npk`) as npk from `nilai` where `jenis` = 'tttmj' and `rekap_nilai_id` = $id";
            $resultTTTMJ = $this->db->query($queryTTTMJ)->row();
            $TTTMJ = $resultTTTMJ->npk;
            
            
            
        } else {
            echo "error"; die;
        } 
    }

    
    
    ?>

    <table>
        <tr>
            <td valign="top">Nomor</td>
            <td valign="top">:</td>
            <td valign="top">143/B3/2019</td>
        </tr>
        <tr>
            <td valign="top">Hal</td>
            <td valign="top">:</td>
            <td valign="top">Hasil penilaian DUPAK guru <br> a.n <?= $pendaftar->nama ?></td>
        </tr>
    </table>


    <p>Yth. Kepala <?= $pendaftar->unit_kerja  ?> <br>
    <?= $pendaftar->alamat_sekolah ?> <br>
    Kab. Banyuwangi Prov. Jawa Timur Kode Pos 58487</p>

    <p align="justify">Sehubungan dengan surat kepala dinas pendidikan kab. banyuwangi Nomor 843/1046/429.101/2018 tanggal <?= date("d M Y", $rekap_nilai->tanggal); ?> hal usul penilaian angka kredit sdr <?= $pendaftar->nama ?> Pangkat <?= $jabatan->pangkat ?>, Jabatan <?= $jabatan->nama ?> pada <?= $pendaftar->unit_kerja ?>, yang telah dinilai oleh tim penilai pusat pada <?= date("d M Y", $rekap_nilai->tanggal)?>, yang bersangkutan dinyatakan 
            <?php if($rekap_nilai->status == 1) : 
            echo " memenuhi "; else : echo " belum memenuhi "; endif; ?> 
    syarat untuk kenaikan jabatan/pangkat setingkat lebih tinggi. hasil penilaian DUPAK dan bukti fisik sebagai berikut:</p>

    <table style="color: #232323;
        border-collapse: collapse; width:100%">
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>No</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Kegiatan</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>AK Lama *)</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>AK Diperoleh **)</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px"><b>Jumlah AK</b></td>
        </tr style="border: 1px solid #999;">

        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                1
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Unsur Utama
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                A. Pendidikan Sekolah
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                B. Diklat Prajabatan
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                C. Pembelajaran/pembimbingan
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= $TOTAL_PB_TTMJ; ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                D. Tugas tertentu
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= tugastambahan($id); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                E. PKB
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                &nbsp;&nbsp; 1) Pengembangan Diri
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= pengembangandiri($id,6); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                &nbsp;&nbsp; 2) Publikasi Ilmiah 
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
            <?= pengembangandiri($id,7); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                &nbsp;&nbsp; 3) Karya Inovatif
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= pengembangandiri($id,8); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Jumlah Unsur Utama
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                2
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Unsur Penunjang
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Ijazah yang tidak sesuai
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= penunjang($id,9); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Pendukung tugas guru
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= penunjang($id,10); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Memperoleh Penghargaan
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <?= penunjang($id,11); ?>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                Jumlah Unsur Penunjang
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                <b>Jumlah Unsur Utama Dan Unsur Penunjang</b>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
    </table>

    <span style="font-size:10px;">*) Penyesuaian PAK atau PAK terakhir</span> <br>
    <span style="font-size:10px;">**) Angka kredit yang diperoleh</span>

	<table style="color: #232323;
        border-collapse: collapse; width:100%">
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999; padding:4px;font-size:13px" Rowspan="2" align="center"><b>Uraian</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px" rowspan="2" align="center"><b>ANGKA KREDIT KUMULATIF</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px" colspan="3" align="center"><b>UNSUR UTAMA</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px" Rowspan="2" align="center"><b>UNSUR PENUNJANG MAX 10%</b></td>
        </tr style="border: 1px solid #999;">
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999; padding:4px;font-size:13px" align="center" ><b>Pengembangan Diri</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px" align="center" ><b>Pub.Ilmiah dan K.Inovatif</b></td>
            <td style="border: 1px solid #999; padding:4px;font-size:13px" align="center" ><b>Jumlah Unsur Utama Min.90%</b></td>
        </tr style="border: 1px solid #999;">

        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                <b>AK yang diperoleh</b>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
               
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                <b>AK yang wajib diperoleh</b>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
               
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
        
        <tr style="border: 1px solid #999;">
            <td style="border: 1px solid #999;padding-left:3px;text-align:center;font-family: sans-serif;font-size:13px">
                <b>Kelebihan/Kekurangan</b>
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
               
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
            <td style="border: 1px solid #999;padding-left:3px;font-family: times-new-roman;font-size:13px">
                
            </td>
        </tr>
    </table>

    <p>Adapun bukti fisik yang tidak diberi nilai angka kreditnya dengan alasan sebagaimana terlampir.</p>

    <p align="justify">Pengajuan usulan penilaian baru, termasuk yang dapat diperbaiki, agar dilengkapi dengan Surat Usulan/Pengantar DUPAK, Daftar usulan penetapan angka kerdit (DUPAK), SK Kenaikan pangkat terakhir, Penetapan angka kredit (PAK) Terakhir, Penyesuaian Penetapan Angka Kredit, SK Jabatan FUngsional Guru Terakhir, Penyesuaian Jabatan fungsional Guru, Konversi NIP, artikel yang dimuat di Jurnal yang ber-ISSN dan disampaikan kepada Direktorat Jendral Guru dan Tenaga Kependidikan u.p. Kepala LPMP Jawa Timur dengan alamat PO BOX 05 SB Karah selaku Sekertariat Bersama TIm Penilai Pusat yang berkedudukan di LPMP dengan melampirkan fotokopi surat ini.</p>

    <p>Atas perhatian Saudara, kami mengucapkan terima kasih.</p>
    
    <br><br>
    
    <table>
        <tr>
            <td width="400px">
                Tembusan : <br>
                1. DIrektur Pembinaan Guru Dikdas; <br>
                2. Kepala Dinas Pendidikan Kab. Banyuwangi; <br>
                3. Kepala LPMP Jawa Timur; <br>
                4. <?= $pendaftar->nama ?> <br>
                &nbsp;&nbsp;&nbsp; <?= $pendaftar->unit_kerja ?>.
            </td>
            <td>
                a.n. Sekretaris Tim Penilai Pusat <br>
                Kepala Seksi Pengembangan Karier <br>
                Subdirektorat Penilaian Kinerja <br>
                dan Pengembangan Karier <br>
                Direktorat Pembinaan Guru Pendidikan Dasar <br>
                Direktorat Jenderal Guru dan Tenaga Kependidikan.
            </td>
        </tr>
    </table>


    <!-- Halaman kedua -->


    <table>
        <tr>
            <td valign="top">
                <img src="<?= $_SERVER["DOCUMENT_ROOT"].'/pak/assets/img/logodinas.png' ?>" alt="" width="80px"  >
            </td>
            <td>
                <div style="text-align:center; margin-left:20px">
                    <h2 style="margin-top:0px; margin-botom:0px;">PEMERINTAH KABUPATEN BANYUWANGI</h2>
                    <h1 style="margin-top:-20px; margin-botom:0px;">DINAS PENDIDIKAN</h1>
                    <p align="center" style="margin-top:-20px;font-size:16px">
                        Jalan KH. Agus Salim No. 5 Telp. (0333) 424680 Fax (0333) 429080 <br>
                        website : pendidikan.banyuwangikab.go.id email : dispendik@banyuwangikab.go.id
                    </p>
                    <h2 style="margin-top:-15px; margin-botom:0px;">BANYUWANGI - 68418</h2>
                </div>
            </td>
        </tr>
    </table>
    
    <hr style="margin-top:-20px; weight:600">
    <br>

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