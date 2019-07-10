<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        // refisi dasbord pendaftar di isi detail data guru, dan foto
        $data['pendaftar'] = $this->db->get_where('pendaftar',['id' => $this->session->userdata('id')])->row();
        
        $data['_view']= "pendaftar/home";

        $this->load->view('template/index', $data);
    }
    
}