<?php

class Pendaftar_model extends CI_model {

    public function countAll()
    {
        $query = $this->db->get("pendaftar");
        return $query->num_rows();
    }

    public function getAll()
    {
        return $this->db->get('pendaftar')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('pendaftar', ['id' => $id])->row();
    }

    public function update()
    {
        $data = [
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
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('pendaftar', $data);
    }

    public function delete($id)
    {
        $this->db->delete('pendaftar', ['id' => $id]);
    }
}