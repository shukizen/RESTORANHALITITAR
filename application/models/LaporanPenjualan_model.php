<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPenjualan_model extends CI_Model {

    public function getAll() {
        $this->db->select('laporan_penjualan.*, SUM(detail_laporan_penjualan.subtotal) AS total_pendapatan');
        $this->db->from('laporan_penjualan');
        $this->db->join('detail_laporan_penjualan', 'detail_laporan_penjualan.laporan_id = laporan_penjualan.laporan_id', 'left');
        $this->db->group_by('laporan_penjualan.laporan_id');
        return $this->db->get()->result_array();
    }

    public function getById($laporan_id) {
        $this->db->select('laporan_penjualan.*, detail_laporan_penjualan.*');
        $this->db->from('laporan_penjualan');
        $this->db->join('detail_laporan_penjualan', 'detail_laporan_penjualan.laporan_id = laporan_penjualan.laporan_id', 'left');
        $this->db->where('laporan_penjualan.laporan_id', $laporan_id);
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        $this->db->insert('laporan_penjualan', $data);
        return $this->db->insert_id();
    }

    public function insertDetail($data) {
        return $this->db->insert('detail_laporan_penjualan', $data);
    }

    public function update($laporan_id, $data) {
        $this->db->where('laporan_id', $laporan_id);
        return $this->db->update('laporan_penjualan', $data);
    }

    public function delete($laporan_id) {
        $this->db->where('laporan_id', $laporan_id);
        $this->db->delete('detail_laporan_penjualan');
        $this->db->where('laporan_id', $laporan_id);
        return $this->db->delete('laporan_penjualan');
    }
}
