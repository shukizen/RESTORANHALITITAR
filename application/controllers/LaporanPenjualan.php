<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPenjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporanPenjualan_model');
    }

    public function index() {
        $data['laporan'] = $this->LaporanPenjualan_model->getAll();
        $this->load->view('laporan_penjualan/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $laporan_data = [
                'tanggal' => $this->input->post('tanggal'),
                'total_transaksi' => $this->input->post('total_transaksi')
            ];
            $laporan_id = $this->LaporanPenjualan_model->insert($laporan_data);

            $details = $this->input->post('details');
            foreach ($details as $detail) {
                $detail_data = [
                    'laporan_id' => $laporan_id,
                    'menu_id' => $detail['menu_id'],
                    'jumlah_terjual' => $detail['jumlah_terjual'],
                    'subtotal' => $detail['subtotal']
                ];
                $this->LaporanPenjualan_model->insertDetail($detail_data);
            }
            redirect('LaporanPenjualan');
        }
        $this->load->view('laporan_penjualan/tambah');
    }

    public function hapus($laporan_id) {
        $this->LaporanPenjualan_model->delete($laporan_id);
        redirect('LaporanPenjualan');
    }
}
