<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_laporan()
    {
        $query = $this->db->get('laporan_penjualan');
        return $query->result_array();
    }

    public function get_laporan_by_id($id)
    {
        $this->db->where('laporan_id', $id);
        $query = $this->db->get('laporan_penjualan');
        return $query->row_array();
    }

    public function insert_laporan($data)
    {
        return $this->db->insert('laporan_penjualan', $data);
    }

    public function update_laporan($id, $data)
    {
        $this->db->where('laporan_id', $id);
        return $this->db->update('laporan_penjualan', $data);
    }

    public function delete_laporan($id)
    {
        $this->db->where('laporan_id', $id);
        return $this->db->delete('laporan_penjualan');
    }
}
