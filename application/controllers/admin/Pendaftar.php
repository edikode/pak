<?php

class Pendaftar extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Pendaftar_model');
    }

	public function index()
	{
        $data['pendaftar'] = $this->Pendaftar_model->getAll();
        
		$data['_view'] = "admin/pendaftar/home";
		$this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $data['pendaftar'] = $this->Pendaftar_model->get($id);

        $data['_view'] = "admin/pendaftar/detail";
		$this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['pendaftar'] = $this->Pendaftar_model->get($id);
        $data['status'] = ['PNS','HONORER'];
        $data['jabatan_fungsional'] = ['Kepala Sekolah','Wali Kelas','Guru Kelas'];
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha'];

        $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim');
        $this->form_validation->set_rules('karpeg', 'KARPEG', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Guru', 'required|trim');
        $this->form_validation->set_rules('tugas_mengajar', 'Tugas Mengajar', 'required|trim');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('jabatan_fungsional', 'Jabatan Fungsional', 'required|trim');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required|trim');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/pendaftar/edit";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pendaftar_model->update();
            $this->session->set_flashdata('flash',"Diubah");
            redirect('admin/pendaftar');
        }
    }

    public function hapus($id)
    {
        $this->Pendaftar_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('admin/pendaftar');
    }
}
