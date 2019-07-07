<?php

class Barang_model extends CI_model {

    public function getAll()
    {
        return $this->db->get('barang')->result();
    }

    public function countAll()
    {
        $query = $this->db->get("barang");
        return $query->num_rows();
    }

    public function getPagination($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by("kode", "ASC");
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result();
    }

    public function get($id)
    {
        return $this->db->get_where('barang', ['kode' => $id])->row();
    }

    public function search()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('satuan', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get('barang')->result();
    }

    public function searchAjax()
    {
        $keyword = $this->input->get('keyword', true);
        $this->db->like('kode', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('satuan', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get('barang')->result();
    }

    public function insert()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama" => $this->input->post('nama', true),
            "satuan" => $this->input->post('satuan', true),
            "harga" => $this->input->post('harga', true),
        ];
        $this->db->insert('barang', $data);
    }

    public function update()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama" => $this->input->post('nama', true),
            "satuan" => $this->input->post('satuan', true),
            "harga" => $this->input->post('harga', true),
        ];
        $this->db->where('kode', $this->input->post('kode', true));
        $this->db->update('barang', $data);
    }

    public function delete($id)
    {
        $this->db->delete('barang', ['kode' => $id]);
    }
}