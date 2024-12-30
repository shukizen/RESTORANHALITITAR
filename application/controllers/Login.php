<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kasir]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index.php');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            $user = $this->Login_model->checkUser($username, $password);

            if ($user && $user->role == $role) {
                $this->session->set_userdata([
                    'user_id' => $user->user_id,
                    'role' => $user->role
                ]);
                redirect('dashboard');
            } else {
                $data['error'] = "Username, password, atau role salah";
                $this->load->view('login/index.php', $data);
            }
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('login');
    }
}
