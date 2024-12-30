<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['laporan'] = $this->Laporan_model->get_all_laporan();
        $this->load->view('laporan/index', $data);
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
            $this->Laporan_model->insert_laporan($data);
            redirect('laporan');
        }
        $this->load->view('laporan/create');
    }

    public function edit($id)
    {
        $data['laporan'] = $this->Laporan_model->get_laporan_by_id($id);
        if ($_POST) {
            $data = [
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'total_pesanan' => $this->input->post('total_pesanan'),
                'total_menu_terjual' => $this->input->post('total_menu_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan'),
            ];
            $this->Laporan_model->update_laporan($id, $data);
            redirect('laporan');
        }
        $this->load->view('laporan/edit', $data);
    }

    public function delete($id)
    {
        $this->Laporan_model->delete_laporan($id);
        redirect('laporan');
    }
}
