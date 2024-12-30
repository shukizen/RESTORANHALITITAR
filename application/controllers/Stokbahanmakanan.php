<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbahanmakanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stokbahanmakanan_model');
    }

    public function index()
    {
        $data['title'] = 'Stok Bahan Makanan';
        $data['content'] = 'dashboamrd/stokbahanmakanan';
        $data['stok_bahan'] = $this->Stokbahanmakanan_model->stok_bahan();
        $data['menu_bahan'] = $this->Stokbahanmakanan_model->menu_bahan();
        $this->load->view('dashboard/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_bahan' => $this->input->post('nama_bahan'),
            'stok_awal' => $this->input->post('stok_awal'),
            'stok_terpakai' => $this->input->post('stok_terpakai'),
            'stok_tersedia' => $this->input->post('stok_tersedia'),
            'harga_bahan' => $this->input->post('harga_bahan'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->Stokbahanmakanan_model->tambah_bahan($data);
        redirect('Stokbahanmakanan');
    }

    public function delete_stok_bahan($id)
    {
        $this->Stokbahanmakanan_model->delete_stok_bahan($id);
        redirect('Stokbahanmakanan');
    }
}
