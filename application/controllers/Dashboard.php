<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library atau model yang dibutuhkan
    }

    public function index() {
        $this->load->view('dashboard/index.php');
    }

}