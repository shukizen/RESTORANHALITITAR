<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['pemesanan'] = $this->Pemesanan_model->get_all();
        $this->load->view('pemesanan/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $this->Pemesanan_model->create($this->input->post());
            redirect('pemesanan');
        }
        $this->load->view('pemesanan/create');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $this->Pemesanan_model->update($id, $this->input->post());
            redirect('pemesanan');
        }
        $data['pemesanan'] = $this->Pemesanan_model->get_by_id($id);
        $this->load->view('pemesanan/edit', $data);
    }

    public function delete($id) {
        $this->Pemesanan_model->delete($id);
        redirect('pemesanan');
    }
}
