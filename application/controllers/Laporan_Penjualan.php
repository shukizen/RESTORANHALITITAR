<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_penjualan_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['content'] = 'dashboard/laporan_penjualan';
        $data['laporan_penjualan'] = $this->Laporan_penjualan_model->get_all_laporan_penjualan();
        $this->load->view('dashboard/index', $data);
    }

    public function create()
    {
        if ($_POST) {
            $data = [
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'total_pesanan' => $this->input->post('total_pesanan'),
                'total_menu_terjual' => $this->input->post('total_menu_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->Laporan_penjualan_model->insert_laporan_penjualan($data);
            redirect('laporan_penjualan');
        }
        $this->load->view('laporan_penjualan/create');
    }

    public function edit($id)
    {
        $data['laporan_penjualan'] = $this->Laporan_penjualan_model->get_laporan_penjualan_by_id($id);
        if ($_POST) {
            $data = [
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'total_pesanan' => $this->input->post('total_pesanan'),
                'total_menu_terjual' => $this->input->post('total_menu_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan'),
            ];
            $this->Laporan_penjualan_model->update_laporan_penjualan($id, $data);
            redirect('laporan_penjualan');
        }
        $this->load->view('laporan_penjualan/edit', $data);
    }

    public function delete($id)
    {
        $this->Laporan_penjualan_model->delete_laporan_penjualan($id);
        redirect('laporan_penjualan');
    }
}
