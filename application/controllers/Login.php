<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index.php');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Login_model->checkUser($username, $password);

            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->user_id,
                    'role' => $user->role
                ]);
                redirect('dashboard');
            } else {
                $data['error'] = "Username atau password salah";
                $this->load->view('login/index.php', $data);
            }
        }
    }

}