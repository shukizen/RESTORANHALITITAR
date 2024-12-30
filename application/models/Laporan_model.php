<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function get_all_laporan()
    {
        return $this->db->get('laporan_penjualan')->result();
    }

    public function get_laporan_by_id($id)
    {
        return $this->db->get_where('laporan_penjualan', ['laporan_id' => $id])->row();
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
