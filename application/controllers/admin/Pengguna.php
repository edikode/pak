<?php

class Pengguna extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Pengguna_model');
    }

	public function index()
	{
        $queryUser = "SELECT `user`.`id`, `user`.`pegawai_id`, `user`.`pendaftar_id`, `user`.`username`, 
                        `user`.`is_active`, `role`.`nama` as `level`
                        FROM `user` 
                        JOIN `role`
                        ON `user`.`role_id` = `role`.`id`
                        ORDER BY `user`.`id`  
                        ";
        $data['pengguna'] = $this->db->query($queryUser)->result();
        
		$data['_view'] = "admin/pengguna/home";
		$this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $queryUser = "SELECT `user`.`id`, `user`.`username`, 
                        `user`.`is_active`, `role`.`nama` as `level`, `user`.`pegawai_id`
                        FROM `user` 
                        JOIN `role`
                        ON `user`.`role_id` = `role`.`id`
                        WHERE `user`.`id` = $id
                        ORDER BY `user`.`id`  
                        ";
        $data['pengguna'] = $this->db->query($queryUser)->row();

        $data['_view'] = "admin/pengguna/detail";
		$this->load->view('template/index', $data);
    }

    public function tambah()
    {
        $data['pegawai'] = $this->db->get('pegawai')->result();
        $data['role'] = $this->db->get('role')->result();

        $this->form_validation->set_rules('pegawai', 'Pegawai', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'is_unique' => 'Username sudah terdaftar',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]',[
            'matches' => 'Password tidak sama',
            'min_length' => 'Password harus lebih dari 4 karakter',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/pengguna/tambah";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pengguna_model->insert();
            $this->session->set_flashdata('flash',"Ditambahkan");
            redirect('admin/pengguna');
        }
    }

    public function hapus($id)
    {
        $this->Pengguna_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('admin/pengguna');
    }
}
