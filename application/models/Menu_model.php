<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_menu()
    {
        $query = $this->db->get('menu');
        return $query->result_array();
    }
}
