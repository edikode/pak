<?php

class Unsur_model extends CI_model {

    public function countAll()
    {
        $query = $this->db->get("unsur");
        return $query->num_rows();
    }

    public function getAll()
    {
        return $this->db->get('unsur')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('unsur', ['id' => $id])->row();
    }

    public function insert()
    {
        $data = [
            "unsur" => $this->input->post('unsur', true),
            "sub_unsur" => $this->input->post('sub_unsur', true),
        ];
        $this->db->insert('unsur', $data);
    }

    public function update()
    {
        $data = [
            "unsur" => $this->input->post('unsur', true),
            "sub_unsur" => $this->input->post('sub_unsur', true),
        ];
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('unsur', $data);
    }

    public function delete($id)
    {
        $this->db->delete('unsur', ['id' => $id]);
    }
}