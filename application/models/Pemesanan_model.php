<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {
    
    public function get_all_pemesanan() {
        return $this->db->get('pemesanan')->result_array();
    }

    public function get_pemesanan_by_id($id) {
        return $this->db->get_where('pemesanan', ['id' => $id])->row_array();
    }

    public function insert_pemesanan($data) {
        return $this->db->insert('pemesanan', $data);
    }

    public function update_pemesanan($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pemesanan', $data);
    }

    public function delete_pemesanan($id) {
        $this->db->where('id', $id);
        return $this->db->delete('pemesanan');
    }
}