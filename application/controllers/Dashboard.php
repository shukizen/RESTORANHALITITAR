<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model jika diperlukan
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard/dashboard_content';
        $this->load->view('dashboard/index', $data);
    }
}
