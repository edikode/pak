<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['_view']= "admin/user";

        $this->load->view('template/index', $data);
    }
    
}