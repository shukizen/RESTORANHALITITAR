<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model jika diperlukan
        $this->load->model('Menu_model');
    }

    public function menumakanan()
    {
        $data['title'] = 'Menu Makanan';
        $data['content'] = 'dashboard/menumakanan'; // Path ke view menumakanan
        $data['menu'] = $this->Menu_model->getMenuMakanan();
        $this->load->view('menu_makanan/index', $data);
    }
}
