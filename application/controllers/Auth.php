<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('nama')){
            redirect('admin/home'); 
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
                $dataUser = $this->db->get_where('pendaftar',['id' => $user->pegawai_id])->row();
            }
            // cek password
            if(password_verify($password, $user->password)) {
                
                $data = [
                    'nama' => $dataUser->nama,
                    'username' => $user->username,
                    'gambar' => $user->gambar,
                    'role_id' => $user->role_id,
                ];
                $this->session->set_userdata($data);
                redirect('admin/home');
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
        $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'is_unique' => 'Email sudah terdaftar',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
            'matches' => 'Password tidak sama',
            'min_length' => 'Password harus lebih dari 4 karakter',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/registrasi');
        }
        else
        {
            // ambil data inputan
            $data = [
                // "nama" => $this->input->post('nama', true),
                "pendaftar_id" => 1,
                "username" => $this->input->post('username', true),
                "password" => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                "gambar" => "avatar.jpg",
                "role_id" => 1,
                "is_active" => 1,
                "date_created" => time(),

            ];
            // simpan ke tabel user
            $this->db->insert('user', $data);

            // pesan 
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Registrasi Berhasil</div>');
            redirect('/');
        }
        
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