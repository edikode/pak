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

        $data['_view']= "pimpinan/pak/home";

        $this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $data['pendaftar_id'] = $id;
        
        $data['_view']= "pimpinan/pak/detailpak";

        $this->load->view('template/index', $data);
    }
    
}