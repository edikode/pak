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

        $data['_view']= "admin/pak/home";

        $this->load->view('template/index', $data);
    }

    

    public function detail($id)
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
        
        $data['_view']= "admin/pak/detail";
        $this->load->view('template/index', $data);
    }

    public function cetak($id){
        // echo $_SERVER["DOCUMENT_ROOT"].'/pak/assets/img/logodinas.png'; die;
        $queryKegiatan = "SELECT `kegiatan`.`id` as kegiatan_id, `nilai`.`id` as nilai_id, `nilai`.`status`,
                            `nilai`.`alasan`, `nilai`.`saran`, `nilai`.`judul`, `kegiatan`.`unsur_id`, `kegiatan`.`kode`, 
                            `kegiatan`.`kegiatan`, `kegiatan`.`satuan`, 
                            `kegiatan`.`angka_kredit`, `kegiatan`.`pelaksana`,
                            `unsur`.`unsur`, `unsur`.`sub_unsur`, 
                            `nilai`.`file`, `nilai`.`rekap_nilai_id` as `rekap_nilai_id`
                            FROM `kegiatan` 
                            JOIN `unsur`
                            ON `kegiatan`.`unsur_id` = `unsur`.`id`
                            JOIN `nilai`
                            ON `kegiatan`.`id` = `nilai`.`kegiatan_id`
                            WHERE `nilai`.`rekap_nilai_id` = $id
                            ORDER BY `kegiatan`.`id` 
                            ";

        $data['kegiatan'] = $this->db->query($queryKegiatan)->result();

        $data['pendaftar'] = $this->db->get_where('pendaftar',['id' => $this->session->userdata('id')])->row();

        $this->load->library('pdf');

        // $customPaper = array(0,0,360,360);
        // $this->pdf->set_paper($customPaper);

        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->filename = "laporan hasil pengajuan.pdf";
        $this->pdf->load_view('pdf/laporan_hasil_pengajuan', $data);
    }

    public function hapus($id){
        $this->db->delete('rekap_nilai', ['id' => $id]);
        $this->db->delete('nilai', ['rekap_nilai_id' => $id]);

        // hapus gambar belum
        $this->session->set_flashdata('flash',"Data Pengajuan berhasil dihapus");
        redirect('admin/pak');
    }
    
}