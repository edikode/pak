<?php

class Unsur extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Unsur_model');
    }

	public function index()
	{
        $data['unsur'] = $this->Unsur_model->getAll();
        
		$data['_view'] = "admin/unsur/home";
		$this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $data['unsur'] = $this->Unsur_model->get($id);

        $data['_view'] = "admin/unsur/detail";
		$this->load->view('template/index', $data);
    }

    public function tambah()
    {
        $data['unsur'] = [
            'PENDIDIKAN',
            'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU','PENGEMBANGAN KEPROFESIAN BERKELANJUTAN',
            'PENUNJANG TUGAS GURU'];

        
        $this->form_validation->set_rules('unsur', 'Unsur Kegiatan', 'required|trim');
        $this->form_validation->set_rules('sub_unsur', 'Sub Unsur Kegiatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/unsur/tambah";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Unsur_model->insert();
            $this->session->set_flashdata('flash',"Ditambahkan");
            redirect('admin/unsur');
        }
    }

    public function edit($id)
    {
        $data['unsur'] = $this->Unsur_model->get($id);
        $data['dataSelect'] = [
            'PENDIDIKAN',
            'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU','PENGEMBANGAN KEPROFESIAN BERKELANJUTAN',
            'PENUNJANG TUGAS GURU'];

        
        $this->form_validation->set_rules('unsur', 'Unsur Kegiatan', 'required|trim');
        $this->form_validation->set_rules('sub_unsur', 'Sub Unsur Kegiatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/unsur/edit";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Unsur_model->update();
            $this->session->set_flashdata('flash',"Diubah");
            redirect('admin/unsur');
        }
    }

    public function hapus($id)
    {
        $this->Unsur_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('admin/unsur');
    }
}
