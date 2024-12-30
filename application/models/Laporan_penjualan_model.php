<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penjualan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_laporan_penjualan()
    {
        $query = $this->db->get('laporan_penjualan');
        return $query->result();
    }

    public function get_laporan_penjualan_by_id($id)
    {
        $this->db->where('laporan_id', $id);
        $query = $this->db->get('laporan_penjualan');
        return $query->row();
    }

    public function insert_laporan_penjualan($data)
    {
        $this->db->insert('laporan_penjualan', $data);
    }

    public function update_laporan_penjualan($id, $data)
    {
        $this->db->where('laporan_id', $id);
        $this->db->update('laporan_penjualan', $data);
    }

    public function delete_laporan_penjualan($id)
    {
        $this->db->where('laporan_id', $id);
        $this->db->delete('laporan_penjualan');
    }
}
