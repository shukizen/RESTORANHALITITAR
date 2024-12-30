<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {
    public function get_all() {
        return $this->db->get('pemesanan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pemesanan', ['pemesanan_id' => $id])->row_array();
    }

    public function create($data) {
        $this->db->insert('pemesanan', [
            'nama_pelanggan' => $data['nama_pelanggan'],
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'status' => $data['status'],
            'kasir_id' => $data['kasir_id']
        ]);
    }

    public function update($id, $data) {
        $this->db->where('pemesanan_id', $id);
        $this->db->update('pemesanan', [
            'nama_pelanggan' => $data['nama_pelanggan'],
            'status' => $data['status'],
            'kasir_id' => $data['kasir_id']
        ]);
    }

    public function delete($id) {
        $this->db->delete('pemesanan', ['pemesanan_id' => $id]);
    }
}
