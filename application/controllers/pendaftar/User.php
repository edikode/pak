<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['_view']= "admin/user";

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row();

        if($data['user']->pegawai_id != ""){
            $pegawai_id = $data['user']->pegawai_id;
            $data['pegawai'] = $this->db->get_where('pegawai', ['id' => $pegawai_id])->row();
            die;
        } else {

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
            
            $data['pendaftar'] = $this->db->get_where('pendaftar', ['id' => $id])->row();

            if ($this->form_validation->run() == FALSE)
            {
                $data['_view']= "admin/edituser";
                $this->load->view('template/index', $data);
            }
            else
            {
                $this->Pendaftar_model->update();
                $this->session->set_flashdata('flash',"Diubah");
                redirect('pendaftar/user/edit/'.$id);
            }
        }
    }

    public function simpanfoto()
    {
        $upload_image = $_FILES['file'];
        
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row();


        $set_name   = $user->username;
        $path       = $_FILES['file']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config = array(
            'upload_path' => "./assets/img/",
            'allowed_types' => "jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048",
            'file_name' => "$set_name".$extension,
            );

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file'))
        {
            $name_file = $this->upload->data('file_name');

            $data = [
                "gambar" => $name_file,
            ];
            
            $this->db->where('id', $user->id);
            $this->db->update('user', $data);

            $this->session->set_flashdata('flash',"Gambar Berhasil perbarui");
            
            return redirect('pendaftar/user/edit/'.$user->pendaftar_id);
        }
        else
        {
            $this->session->set_flashdata('flash',$this->upload->display_errors());
            return redirect('pendaftar/user/edit/'.$user->pendaftar_id);
        }

    }

}