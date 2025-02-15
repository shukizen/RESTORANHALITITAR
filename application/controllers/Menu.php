<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model Menu_model
        $this->load->model('Menu_model');
    }

    public function menumakanan()
    {
        $data['title'] = 'Menu Makanan';
        $data['content'] = 'dashboard/menumakanan';
        $data['menu'] = $this->Menu_model->get_all_menu();
        $this->load->view('dashboard/index', $data);
    }
}
