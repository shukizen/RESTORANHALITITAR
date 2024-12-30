<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemesanan_model');
    }

    public function index() {
        $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan();
        $this->load->view('pemesanan/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'menu'           => $this->input->post('menu'),
                'jumlah'         => $this->input->post('jumlah'),
                'total_harga'    => $this->input->post('total_harga')
            ];
            $this->Pemesanan_model->insert_pemesanan($data);
            redirect('pemesanan');
        } else {
            $this->load->view('pemesanan/create');
        }
    }

    public function edit($id) {
        $data['pemesanan'] = $this->Pemesanan_model->get_pemesanan_by_id($id);

        if ($this->input->post()) {
            $update_data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'menu'           => $this->input->post('menu'),
                'jumlah'         => $this->input->post('jumlah'),
                'total_harga'    => $this->input->post('total_harga')
            ];
            $this->Pemesanan_model->update_pemesanan($id, $update_data);
            redirect('pemesanan');
        } else {
            $this->load->view('pemesanan/edit', $data);
        }
    }

    public function delete($id) {
        $this->Pemesanan_model->delete_pemesanan($id);
        redirect('pemesanan');
    }

    public function laporan() {
        $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan();
        $this->load->view('pemesanan/laporan', $data);
    }
}