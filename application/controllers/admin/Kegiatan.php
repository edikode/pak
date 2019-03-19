<?php

class Kegiatan extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
    }

	public function index()
	{
        $queryKegiatan = "SELECT `kegiatan`.`id`, `kegiatan`.`kode`, 
                        `kegiatan`.`kegiatan`, `kegiatan`.`satuan`, 
                        `kegiatan`.`angka_kredit`, `kegiatan`.`pelaksana`,
                        `unsur`.`unsur`, `unsur`.`sub_unsur`
                        FROM `kegiatan` 
                        JOIN `unsur`
                        ON `kegiatan`.`unsur_id` = `unsur`.`id`
                        ORDER BY `kegiatan`.`id`  
                        ";
        $data['kegiatan'] = $this->db->query($queryKegiatan)->result();
        
		$data['_view'] = "admin/kegiatan/home";
		$this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $queryKegiatan = "SELECT `kegiatan`.`id`, `kegiatan`.`kode`, 
                        `kegiatan`.`kegiatan`, `kegiatan`.`satuan`, 
                        `kegiatan`.`angka_kredit`, `kegiatan`.`pelaksana`,
                        `unsur`.`unsur`, `unsur`.`sub_unsur`
                        FROM `kegiatan` 
                        JOIN `unsur`
                        ON `kegiatan`.`unsur_id` = `unsur`.`id`
                        WHERE `kegiatan`.`id` = $id
                        ORDER BY `kegiatan`.`id`  
                        ";
        $data['kegiatan'] = $this->db->query($queryKegiatan)->row();

        $data['_view'] = "admin/kegiatan/detail";
		$this->load->view('template/index', $data);
    }

    public function tambah()
    {
        $data['unsur'] = $this->db->get('unsur')->result();

        $this->form_validation->set_rules('kode', 'Kode Kegiatan', 'required|trim|is_unique[kegiatan.kode]',[
            'is_unique' => 'Kode Kegiatan sudah terdaftar',
        ]);
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('angka_kredit', 'Angka Kredit', 'required|trim|numeric');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|trim');
        $this->form_validation->set_rules('unsur', 'Unsur Kegiatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/kegiatan/tambah";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Kegiatan_model->insert();
            $this->session->set_flashdata('flash',"Ditambahkan");
            redirect('admin/kegiatan');
        }
    }

    public function edit($id)
    {
        $data['unsur'] = $this->db->get('unsur')->result();
        $data['kegiatan'] = $this->Kegiatan_model->get($id);

        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('angka_kredit', 'Angka Kredit', 'required|trim|numeric');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|trim');
        $this->form_validation->set_rules('unsur', 'Unsur Kegiatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "admin/kegiatan/edit";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Kegiatan_model->update();
            $this->session->set_flashdata('flash',"Diubah");
            redirect('admin/kegiatan');
        }
    }

    public function hapus($id)
    {
        $this->Kegiatan_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('admin/kegiatan');
    }
}
