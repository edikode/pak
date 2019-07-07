<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // 
    public function index()
    {
        if($this->session->userdata('role_id') == 1){
            redirect('admin/home');
        } else if($this->session->userdata('role_id') == 2){
            redirect('pimpinan/home');
        } else if($this->session->userdata('role_id') == 3){
            redirect('penilai/home');
        } else if($this->session->userdata('role_id') == 4){
            redirect('pendaftar/home');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            // menuju fungsi Login
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['username' => $username])->row();
        
        // jika username ada
        if($user) {

            // ambil data dari pegawai / pendaftar
            if($user->pegawai_id){
                $dataUser = $this->db->get_where('pegawai',['id' => $user->pegawai_id])->row();
            } else {
                $dataUser = $this->db->get_where('pendaftar',['id' => $user->pendaftar_id])->row();
            }
            // cek password
            if(password_verify($password, $user->password)) {
                
                $data = [
                    'id' => $dataUser->id,
                    'nama' => $dataUser->nama,
                    'username' => $user->username,
                    'gambar' => $user->gambar,
                    'role_id' => $user->role_id,
                ];
                $this->session->set_userdata($data);

                if($user->role_id == 1){
                    redirect('admin/home');
                } else if($user->role_id == 2){
                    redirect('pimpinan/home');
                } else if($user->role_id == 3){
                    redirect('penilai/home');
                } else if($user->role_id == 4){
                    redirect('pendaftar/home');
                }

            } else {
                // pesan
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            // pesan 
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $data['status'] = ['PNS','HONORER'];
        $data['jabatan'] = $this->db->get('jabatan')->result();
        $data['jabatan_fungsional'] = $this->db->get('jabatan_fungsional')->result();
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha'];

        $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[pendaftar.nip]',[
            'is_unique' => 'NIP sudah terdaftar',
        ]);
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
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'is_unique' => 'User sudah terdaftar',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
            'matches' => 'Password tidak sama',
            'min_length' => 'Password harus lebih dari 4 karakter',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/registrasi',$data);
        }
        else
        {
            // ambil data inputan ke satu
            $dataKesatu = [
                "nama" => $this->input->post('nama', true),
                "nip" => $this->input->post('nip', true),
                "nuptk" => $this->input->post('nuptk', true),
                "karpeg" => $this->input->post('karpeg', true),
                "tmp_lahir" => $this->input->post('tmp_lahir', true),
                "tgl_lahir" => $this->input->post('tgl_lahir', true),
                "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
                "agama" => $this->input->post('agama', true),
                "status_guru" => $this->input->post('status', true),
                "tugas_mengajar" => $this->input->post('tugas_mengajar', true),
                "unit_kerja" => $this->input->post('unit_kerja', true),
                "jabatan_id" => $this->input->post('jabatan', true),
                "jabatan_fungsional_id" => $this->input->post('jabatan_fungsional', true),
                "alamat_rumah" => $this->input->post('alamat_rumah', true),
                "alamat_sekolah" => $this->input->post('alamat_sekolah', true),
                "email" => $this->input->post('email', true),
                "telepon" => $this->input->post('telepon', true),
                "gambar" => "avatar.jpg",
                "is_active" => 1,
                "date_created" => time(),

            ];
            // simpan ke tabel user
            $this->db->insert('pendaftar', $dataKesatu);


            // ambil data inputan ke dua
            $dataKedua = [
                // "nama" => $this->input->post('nama', true),
                "pendaftar_id" => $this->db->insert_id(),
                "username" => $this->input->post('username', true),
                "password" => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                "gambar" => "avatar.jpg",
                "role_id" => 4,
                "is_active" => 1,
                "date_created" => time(),

            ];
            // simpan ke tabel user
            $this->db->insert('user', $dataKedua);

            // pesan 
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Registrasi Berhasil</div>');
            redirect('/');
        }
        
    }

    public function forbidden()
    {
        $this->load->view('auth/403');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('gambar');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Logout Berhasil</div>');
        redirect('/');
    }
    
}