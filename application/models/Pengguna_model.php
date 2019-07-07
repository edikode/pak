<?php

class Pengguna_model extends CI_model {

    public function countAll()
    {
        $query = $this->db->get("user");
        return $query->num_rows();
    }

    public function getAll()
    {
        return $this->db->get('user')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function insert()
    {
        $data = [
            "pegawai_id" => $this->input->post('pegawai', true),
            "role_id" => $this->input->post('role', true),
            "username" => $this->input->post('username', true),
            "password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            "gambar" => "avatar.jpg",
            "is_active" => 1,
            "date_created" => time(),
        ];
        $this->db->insert('user', $data);
    }

    public function update()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama" => $this->input->post('nama', true),
            "tmp_lahir" => $this->input->post('tmp_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "status" => $this->input->post('status', true),
            "jabatan" => $this->input->post('jabatan', true),
            "agama" => $this->input->post('agama', true),
            "telepon" => $this->input->post('telepon', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
}