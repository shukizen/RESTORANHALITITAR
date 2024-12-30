<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbahanmakanan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function stok_bahan()
    {
        $query = $this->db->get('stok_bahan');
        return $query->result_array();
    }

    public function menu_bahan()
    {
        $this->db->select('menu_bahan.*, stok_bahan.*, menu.nama_menu');
        $this->db->from('menu_bahan');
        $this->db->join('stok_bahan', 'menu_bahan.stok_id = stok_bahan.stok_id');
        $this->db->join('menu', 'menu_bahan.menu_id = menu.menu_id');
        return $this->db->get()->result_array();
    }

    public function edit_stok_bahan($id)
    {
        $this->db->select('menu_bahan.*, stok_bahan.*, menu.nama_menu');
        $this->db->from('menu_bahan');
        $this->db->join('stok_bahan', 'menu_bahan.stok_id = stok_bahan.stok_id');
        $this->db->join('menu', 'menu_bahan.menu_id = menu.menu_id');
        $this->db->where('menu_bahan.stok_id', $id);
        return $this->db->get()->row_array();
    }


    public function delete_stok_bahan($id)
    {
        $this->db->where('stok_id', $id);
        $this->db->delete('menu_bahan');

        $this->db->where('stok_id', $id);
        $this->db->delete('stok_bahan');
    }


    public function tambah_bahan($data)
    {
        $this->db->insert('stok_bahan', $data);
    }
}
