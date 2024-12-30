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
        $data['title'] = 'Data Laporan';
        $data['content'] = 'dashboard/laporan';
        $data['laporan'] = $this->Laporan_model->get_all_laporan();
        $this->load->view('dashboard/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Laporan';
        $data['content'] = 'dashboard/tambah_laporan';

        if ($this->input->post()) {
            $laporan_data = array(
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'total_pesanan' => $this->input->post('total_pesanan'),
                'total_menu_terjual' => $this->input->post('total_menu_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->Laporan_model->insert_laporan($laporan_data);
            redirect('Laporan');
        }

        $this->load->view('dashboard/index', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Laporan';
        $data['content'] = 'dashboard/edit_laporan';
        $data['laporan'] = $this->Laporan_model->get_laporan_by_id($id);

        if ($this->input->post()) {
            $update_data = array(
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'total_pesanan' => $this->input->post('total_pesanan'),
                'total_menu_terjual' => $this->input->post('total_menu_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan')
            );

            $this->Laporan_model->update_laporan($id, $update_data);
            redirect('Laporan');
        }

        $this->load->view('dashboard/index', $data);
    }

    public function delete($id)
    {
        $this->Laporan_model->delete_laporan($id);
        redirect('Laporan');
    }
}
