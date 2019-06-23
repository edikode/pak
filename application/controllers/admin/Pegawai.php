<?php

class Pegawai extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Pegawai_model');
    }

	public function index()
	{
        $data['pegawai'] = $this->Pegawai_model->getAll();
        
		$data['_view'] = "admin/pegawai/home";
		$this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $data['pegawai'] = $this->Pegawai_model->get($id);

        $data['_view'] = "admin/pegawai/detail";
		$this->load->view('template/index', $data);
    }

    public function tambah()
    {
        $data['status'] = ['BK','K'];
        $data['jabatan'] = ['Kepala Dinas','Sekertaris','Bendahara','Pegawai'];
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha'];

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[pegawai.nip]',[
            'is_unique' => 'NIP sudah terdaftar',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/pegawai/tambah";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pegawai_model->insert();
            $this->session->set_flashdata('flash',"Ditambahkan");
            redirect('admin/pegawai');
        }
    }

    public function edit($id)
    {
        $data['pegawai'] = $this->Pegawai_model->get($id);
        $data['jabatan'] = ['Kepala Dinas','Sekertaris','Bendahara','Pegawai'];
        $data['status'] = ['BK','K'];
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha'];

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/pegawai/edit";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pegawai_model->update();
            $this->session->set_flashdata('flash',"Diubah");
            redirect('admin/pegawai');
        }
    }

    public function hapus($id)
    {
        $this->Pegawai_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('admin/pegawai');
    }
}
