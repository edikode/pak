<?php

class Kegiatan_model extends CI_model {

    public function countAll()
    {
        $query = $this->db->get("kegiatan");
        return $query->num_rows();
    }

    public function getAll()
    {
        return $this->db->get('kegiatan')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('kegiatan', ['id' => $id])->row();
    }

    public function insert()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "kegiatan" => $this->input->post('kegiatan', true),
            "satuan" => $this->input->post('satuan', true),
            "angka_kredit" => $this->input->post('angka_kredit', true),
            "pelaksana" => $this->input->post('pelaksana', true),
            "unsur_id" => $this->input->post('unsur', true),
        ];
        $this->db->insert('kegiatan', $data);
    }

    public function update()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "kegiatan" => $this->input->post('kegiatan', true),
            "satuan" => $this->input->post('satuan', true),
            "angka_kredit" => $this->input->post('angka_kredit', true),
            "pelaksana" => $this->input->post('pelaksana', true),
            "unsur_id" => $this->input->post('unsur', true),
        ];
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('kegiatan', $data);
    }

    public function delete($id)
    {
        $this->db->delete('kegiatan', ['id' => $id]);
    }
}