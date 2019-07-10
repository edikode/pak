<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pak extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $queryRekapNilai = "SELECT `pendaftar`.*, `rekap_nilai`.*
                        FROM `rekap_nilai` 
                        JOIN `pendaftar`
                        ON `rekap_nilai`.`pendaftar_id` = `pendaftar`.`id`
                        JOIN `nilai`
                        ON `rekap_nilai`.`id` = `nilai`.`rekap_nilai_id`
                        GROUP BY `rekap_nilai`.`tanggal` 
                        ORDER BY `rekap_nilai`.`id` DESC
                        ";
        $data['rekap_nilai'] = $this->db->query($queryRekapNilai)->result();

        $data['_view']= "penilai/pak/home";

        $this->load->view('template/index', $data);
    }

    

    public function validasi($id)
    {
        // harus otomatis sesuai data terakhir yg belum divalidasi
        $rekap_nilai_id = $id;
        $queryKegiatan = "SELECT `kegiatan`.`id` as kegiatan_id, `nilai`.`id` as nilai_id, `nilai`.`status`,
                        `nilai`.`alasan`, `nilai`.`saran`, `kegiatan`.`unsur_id`, `kegiatan`.`kode`, 
                        `kegiatan`.`kegiatan`, `kegiatan`.`satuan`, 
                        `kegiatan`.`angka_kredit`, `kegiatan`.`pelaksana`,
                        `unsur`.`unsur`, `unsur`.`sub_unsur`, 
                        `nilai`.`file`, `nilai`.`rekap_nilai_id` as `rekap_nilai_id`
                        FROM `kegiatan` 
                        JOIN `unsur`
                        ON `kegiatan`.`unsur_id` = `unsur`.`id`
                        JOIN `nilai`
                        ON `kegiatan`.`id` = `nilai`.`kegiatan_id`
                        WHERE `nilai`.`rekap_nilai_id` = $rekap_nilai_id
                        ORDER BY `kegiatan`.`id` 
                        ";
        $data['kegiatan'] = $this->db->query($queryKegiatan)->result();
        
        $data['_view']= "penilai/pak/validasi";
        $this->load->view('template/index', $data);
    }

    public function lakukanvalidasi($id)
    {
        $rekap_nilai_id = $this->input->post('rekap_nilai_id', true);
        $alasan = $this->input->post('alasan', true);
        $saran = $this->input->post('saran', true);
        $status = $this->input->post('status', true);

        $data = [
            "tanggal"
            "alasan" => $alasan,
            "saran" => $saran,
            "status" => $status,
        ];
        
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
        redirect('penilai/pak/validasi/'.$rekap_nilai_id);
    }

    public function ceksemuavalidasi($id)
    {
        $dataBelumvalidasi = $this->db->get_where('nilai',['rekap_nilai_id' => $id, 'status' => 0])->num_rows();

        if($dataBelumvalidasi == 0) {
            // data sudah divalidasi semua
            $dataHasil = $this->db->get_where('nilai',['rekap_nilai_id' => $id, 'status' => 2])->num_rows();

            if($dataHasil >= 1) {
                // data ada yg tidak valid
                $this->db->where('id', $id);
                $this->db->update('rekap_nilai', ['status' => 2]);
            } else {
                // data valid semua
                $this->db->where('id', $id);
                $this->db->update('rekap_nilai', ['status' => 1]);

                    // HITUNG  AK Penilaian sesuai lama tahun mengajar dr pendaftar
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
                        $TOTAL_PB_TTMJ = $Query_PB->npk * $Query_PB->tahun;
                    }

                    // Tugas Tambahan penugasan 1 tahun
                    $queryTTTMJ ="SELECT SUM(`npk`) as npk from `nilai` where `jenis` = 'tttmj' and `rekap_nilai_id` = $id";
                    $resultTTTMJ = $this->db->query($queryTTTMJ)->row();
                    $TTTMJ = $resultTTTMJ->npk;
                    
                    // Tugas Tambahan penugasan kurang dari 1 tahun
                    $queryPKDT ="SELECT SUM(`npk`) as npk from `nilai` where `jenis` = 'pkdt' and `rekap_nilai_id` = $id";
                    $resultPKDT = $this->db->query($queryPKDT)->row();
                    $PKDT = $resultPKDT->npk;
                    
                    // ambil nilai AK dari PENGEMBANGAN KEPROFESIAN BERKELANJUTAN (AKPKB)
                    // id dari tabel unsur AKPKB : 6,7,8
                    $queryPKB = "SELECT SUM(`angka_kredit`) as jumlah from `nilai` join `kegiatan` where `nilai`.`rekap_nilai_id` = $id and `nilai`.`kegiatan_id` = `kegiatan`.`id` and `nilai`.`status` = 1 and `kegiatan`.`unsur_id` between 6 and 8";

                    $result = $this->db->query($queryPKB)->row();
                    $AKPKB = $result->jumlah;

                    // ambil nilai AK dari PENUNJANG TUGAS GURU (AKP)
                    // id dari tabel unsur AKP : 9,10,11
                    $queryAKP = "SELECT SUM(`angka_kredit`) as jumlah from `nilai` join `kegiatan` where `nilai`.`rekap_nilai_id` = $id and `nilai`.`kegiatan_id` = `kegiatan`.`id` and `nilai`.`status` = 1 and `kegiatan`.`unsur_id` between 9 and 11";

                    $result = $this->db->query($queryAKP)->row();
                    $AKP = $result->jumlah;

                    // NILAI ANGKA KREDIT  KESELURUHAN
                    $AKK = $TOTAL_PB_TTMJ + $TTTMJ + $PKDT + $AKPKB + $AKP;
                    
                    echo ' PB DAN TUGAS TAMBAHAN = '.$TOTAL_PB_TTMJ;
                    echo '<br> PENUGASAN 1 TAHUN = '.$TTTMJ;
                    echo '<br> PENUGASAN KURANG DARI 1 TAHUN = '.$PKDT;
                    echo '<br> AK PENGEMBANGAN KB = '.$AKPKB;
                    echo '<br> AK PENUNJANG = '.$AKP;
                    echo '<br> AK KESELURUHAN = '.$AKK;


                    // AMBIL NILAI AK MINIMAL KELULUSAN DI TABEL JABATAN
                    $rekap_nilai = $this->db->get_where('rekap_nilai',['id' => $id])->row();
                    $queryJabatan = "SELECT `jabatan`.* from `jabatan`, `pendaftar` where `jabatan`.`id` = `pendaftar`.`jabatan_id` and `pendaftar`.`id` = $rekap_nilai->pendaftar_id";
                    $jabatan = $this->db->query($queryJabatan)->row();

                    // CEK KELULUSAN
                    if($AKK >= $jabatan->perjenjang){

                        $this->db->where('id', $id);
                        $this->db->update('rekap_nilai', ['status' => 1]);

                        // SIMPAN NILAI ANGKA KREDIT KESELURUHAN DI REKAP NILAI
                        $this->db->where('id', $id);
                        $this->db->update('rekap_nilai', ['hasil_akk' => $AKK]);

                        // NAIK JABATAN BARU, tabel pendaftar kolom jabatan diubah
                        // $this->db->where('id', $rekap_nilai->pendaftar_id);
                        // $this->db->update('pendaftar', ['jabatan_id' => $rekap_nilai->ke]);

                        echo "<br> NAIK  PANGKAT";

                    } else {

                        $this->db->where('id', $id);
                        $this->db->update('rekap_nilai', ['status' => 3]);
                        
                        // SIMPAN NILAI ANGKA KREDIT KESELURUHAN DI REKAP NILAI
                        $this->db->where('id', $id);
                        $this->db->update('rekap_nilai', ['hasil_akk' => $AKK]);

                        echo "<br> GAGAL NAIK  PANGKAT";
                    }

                    die;
            }

            $this->session->set_flashdata('flash',"divalidasi semua, pendaftar berhasil naik jabatan");
            redirect('penilai/pak');
        } else {
            // data ada yg belum divalidasi
            $this->session->set_flashdata('flash',"Data ada yang belum divalidasi");
            redirect('penilai/pak/validasi/'.$id);
        }
    }

    public function validasinilai($rekap_id, $id)
    {
        $this->form_validation->set_rules('tugas_tambahan', 'Tugas Tambahan', 'required|trim');
        
        if ($this->form_validation->run() == FALSE)
        {
            $queryKegiatan = "SELECT `nilai`.`id`, `nilai`.`status`, `kegiatan`.`unsur_id`, `kegiatan`.`kode`, 
                        `kegiatan`.`kegiatan`, `kegiatan`.`satuan`, 
                        `kegiatan`.`angka_kredit`, `kegiatan`.`pelaksana`,
                        `unsur`.`unsur`, `unsur`.`sub_unsur`, 
                        `nilai`.`file`, `nilai`.`rekap_nilai_id` as `rekap_nilai_id`
                        FROM `kegiatan` 
                        JOIN `unsur`
                        ON `kegiatan`.`unsur_id` = `unsur`.`id`
                        JOIN `nilai`
                        ON `kegiatan`.`id` = `nilai`.`kegiatan_id`
                        WHERE `nilai`.`rekap_nilai_id` = $rekap_id
                        ORDER BY `kegiatan`.`id` 
                        ";
            $data['kegiatan'] = $this->db->query($queryKegiatan)->result();
            $data['_view']= "penilai/pak/validasi";
            $this->load->view('template/index', $data);

        } else {

            $data = [
                "jumlah_jam" => $this->input->post('jumlah_jam'),
                "tahun" => $this->input->post('tahun'),
                "nilai" => $this->input->post('nilai'),
            ];
            
            $this->db->where('id', $id);
            $this->db->update('nilai', $data);

            $nilai = $this->db->get_where('nilai',['id' => $id])->row();
            $AKPP = 0;
            if($nilai->status == 1){

                // AMBIL NILAI PK MAKSIMAL SESUAI JABATAN FUNGSIONAL
                $queryJabatanFungsional = "SELECT `jabatan_fungsional`.* from `jabatan_fungsional`, `nilai` where `jabatan_fungsional`.`id` = `nilai`.`jabatan_fungsional_id` and `nilai`.`id` = $nilai->id";
                $jabatan_fungsional = $this->db->query($queryJabatanFungsional)->row();
                $npkg_maks = $jabatan_fungsional->nilai_pk_maks;

                // PK DARI USER
                $npkg = $nilai->nilai;
                // JUMLAH JAM / SISWA DARI USER
                $JM = $nilai->jumlah_jam;
                // HITUNG PK
                $hasilnpkg = $npkg / $npkg_maks * 100;

                // Konfersi ke skala Permenegpan no 16 tahun 2009
                $NPK = $this->konfersi($hasilnpkg);
                
                // ambil nilai  akk,  akpkb, dan akp dari jabatan
                $rekap_nilai = $this->db->get_where('rekap_nilai',['id' => $nilai->rekap_nilai_id])->row();

                $queryJabatan = "SELECT `jabatan`.* from `jabatan`, `pendaftar` where `jabatan`.`id` = `pendaftar`.`jabatan_id` and `pendaftar`.`id` = $rekap_nilai->pendaftar_id";
                $jabatan = $this->db->query($queryJabatan)->row();

                $AK = $jabatan->perjenjang;
                $AKPKB = $jabatan->akpkb;
                $AKP = $jabatan->akp;

                // jika jenis pembelajaran / bimbingan
                if($nilai->jenis == "pb"){
                    // hitung angka kredit pembelajaran
                    if($NPK >= 75){
                        // APAKAH GURU PUNYA TUGAS TAMBAHAN  Mengurangi Jam?
                        $Query_TTMJ = $this->db->get_where('nilai',['jenis' => "ttmj",'rekap_nilai_id' => $rekap_id])->row();

                        // TOTAL PB DAN TTMJ
                        if($Query_TTMJ){
                            // JIKA PUNYA TUGAS TAMBAHAN
                            if($jabatan_fungsional->tugas == "Guru Bimbingan"){
                                // JIKA GURU BP
                                if($Query_TTMJ->jabatan_fungsional_id == 1){
                                    // KEPALA SEKOLAH MENANGANI 35 orang
                                    $JWM = 35;
                                    // HITUNG ANGKA KREDIT PER TAHUN
                                    echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;

                                } else {
                                    // SELAIN KEPALA SEKOLAH MENANGANI 75 ORANG
                                    $JWM = 75;
                                    // HITUNG ANGKA KREDIT PER TAHUN
                                    echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;
                                    
                                }

                            } else {
                                // JIKA GURU MENGAJAR
                                if($Query_TTMJ->jabatan_fungsional_id == 1){
                                    // KEPALA SEKOLAH MENGAJAR 6 JAM
                                    $JWM = 6;
                                    // HITUNG ANGKA KREDIT PER TAHUN
                                    echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;

                                } else {
                                    // SELAIN KEPALA SEKOLAH MENGAJAR 12 JAM
                                    $JWM = 12;
                                    // HITUNG ANGKA KREDIT PER TAHUN
                                    echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;
                                }
                                
                            }
                        
                        } else {
                            // TIDAK PUNYA TUGAS TAMBAHAN
                            if($jabatan_fungsional->tugas == "Guru Bimbingan"){
                                // guru bp MENANGANI normal 150-250 orang 1 tahun
                                if($JM < 150){
                                    $JWM = 150;
                                } else if($JM >= 150 && $JM <= 250){
                                    $JWM = $JM;
                                } else if($JM > 250) {
                                    $JWM = 250;
                                }
                                // HITUNG ANGKA KREDIT PER TAHUN
                                echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;
                            
                            } else {
                                // guru mengajar normal 24-40 jam 1 mnggu
                                if($JM < 24){
                                    $JWM = 24;
                                } else if($JM >= 24 && $JM <= 40){
                                    $JWM = $JM;
                                } else if($JM > 40) {
                                    $JWM = 40;
                                }

                                // HITUNG ANGKA KREDIT PER TAHUN
                                echo $AKPT = (($AK-$AKPKB-$AKP) * $JM/$JWM * $NPK/100 ) / 4;

                            }
                        }        
                            
                        
                    } else {
                        echo "nilai kurang dari 75%";die;
                    } 
                } else if($nilai->jenis == "ttmj"){
                    // HITUNG ANGKA KREDIT PER TAHUN U/ TUGAS TAMBAHAN
                    if($NPK >= 75){
                        $AKPT = (($AK-$AKPKB-$AKP) * $NPK/100 ) / 4;

                    } else {
                        echo "nilai kurang dari 75%";die;
                    }  

                } else if($nilai->jenis == "tttmj"){
                    // MENGAMBIL NILAI PEMBELAJARAN/BIMBINGAN
                    $AKG = $this->db->get_where('nilai',['jenis' => "pb",'rekap_nilai_id' => $nilai->rekap_nilai_id])->row();

                    if($AKG){
                        // HITUNG ANGKA KREDIT U/ PENUGASAN 1 TAHUN 5%
                        echo $AKPT = $AKG->npk * 5/100;

                    } else {
                        echo "Nilai Pembelajaran / Bimbingan Kosong!";die;
                    }  
                } else if($nilai->jenis == "pkdt"){
                    // MENGAMBIL NILAI PEMBELAJARAN/BIMBINGAN
                    $AKG = $this->db->get_where('nilai',['jenis' => "pb",'rekap_nilai_id' => $nilai->rekap_nilai_id])->row();

                    if($AKG){
                        // HITUNG ANGKA KREDIT U/ PENUGASAN KURANG DARI 1 TAHUN 2%
                        echo $AKPT = $AKG->npk * 2/100;

                    } else {
                        echo "Nilai Pembelajaran / Bimbingan Kosong!";die;
                    }  
                }
            }

            $data = [
                "status" => $this->input->post('status'),
                "npk" => $AKPT,
            ];
            
            $this->db->where('id', $id);
            $this->db->update('nilai', $data);

            redirect('penilai/pak/validasi/'.$rekap_id);
        }
    }

    private function konfersi($hasilnpkg)
    {
        $NPK = 0;
        $konversi2 = "";
        if( $hasilnpkg <= 50 ){
            $NPK = 25;
            $konversi2 = "Kurang";

        } else if( $hasilnpkg >= 51 && $hasilnpkg <= 60 ){
            $NPK = 50;
            $konversi2 = "Sedang";
        } else if( $hasilnpkg >= 61 && $hasilnpkg <= 75 ){
            $NPK = 75;
            $konversi2 = "Cukup";
        } else if( $hasilnpkg >= 76 && $hasilnpkg <= 90 ){
            $NPK = 100;
            $konversi2 = "Baik";
        } else if( $hasilnpkg >= 91 && $hasilnpkg <= 100 ){
            $NPK = 125;
            $konversi2 = "Amat Baik";
        }

        return $NPK;
    }

    public function cetak(){
        $data['kosong'] = "Kosong"; 

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan penilaian kerja guru.pdf";
        $this->pdf->load_view('pdf/Laporan_PK_Guru', $data);
    }

    public function hapus($id){
        $this->db->delete('rekap_nilai', ['id' => $id]);
        $this->db->delete('nilai', ['rekap_nilai_id' => $id]);

        // hapus gambar belum
        $this->session->set_flashdata('flash',"Data Pengajuan berhasil dihapus");
        redirect('penilai/pak');
    }
    
}