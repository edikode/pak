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
                        WHERE `nilai`.`rekap_nilai_id` = $rekap_nilai_id
                        ORDER BY `kegiatan`.`id` 
                        ";
        $data['kegiatan'] = $this->db->query($queryKegiatan)->result();
        
        $data['_view']= "penilai/pak/validasi";
        $this->load->view('template/index', $data);

    }

    public function lakukanvalidasi()
    {
        $status = $this->input->post('dataValidasi', true);
        $nilai_id = $this->input->post('dataId', true);

        $data = [
            "status" => $status,
        ];
        
        $this->db->where('id', $nilai_id);
        $this->db->update('nilai', $data);
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

                // UBAH JABATAN BARU dari guru
                $rekapNilai = $this->db->get_where('rekap_nilai',['id' => $id])->row();

                $this->db->where('id', $rekapNilai->pendaftar_id);
                $this->db->update('pendaftar', ['jabatan_id' => $rekapNilai->ke]);
            }

            $this->session->set_flashdata('flash',"divalidasi semua, pendaftar berhasil naik jabatan");
            redirect('penilai/pak');
        } else {
            // data ada yg belum divalidasi
            $this->session->set_flashdata('flash',"Data ada yang belum divalidasi");
            redirect('penilai/pak/validasi/'.$id);
        }
    }

    public function hapus($id){
        $this->db->delete('rekap_nilai', ['id' => $id]);
        $this->db->delete('nilai', ['rekap_nilai_id' => $id]);

        // hapus gambar belum
        $this->session->set_flashdata('flash',"Data Pengajuan berhasil dihapus");
        redirect('penilai/pak');
    }
    
}