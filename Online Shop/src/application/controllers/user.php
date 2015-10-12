<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model("Get_model");
    }

    public function login()
    {
        $this->load->helper(array('form'));
        $data['results'] = $this->Get_model->getAllRecords("login");
        $this->load->view("/inc/login", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view("/inc/login_view");
        $this->load->view("/inc/site_footer", $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('main', 'refresh');
    }

    public function register()
    {
        $data['results'] = $this->Get_model->getAllRecords("register");
        $this->load->view("/inc/login", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view('/reg/register_view');
        $this->load->view("/inc/site_footer", $data);
    }

    public function do_register()
    {
        if ($this->input->post('register')) {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => MD5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
            );
            if ($this->user_model->add_user($data)) {
                $data['results'] = $this->Get_model->getAllRecords("register");
                $this->load->view("/inc/site_header", $data);
                $this->load->view("/inc/site_nav");
                $this->load->view("/reg/register_done");
                $this->load->view("/inc/site_footer", $data);
            } else {
                echo "Registration failed";
            }
        }
    }

    public function verifylogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            redirect('main', 'refresh');
        }
    }

    public function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->user_model->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function view_all_users()
    {
        $data['users'] = $this->user_model->getAllUsers();
        $this->load->view('/admin/view_users', $data);
        $this->load->view("/admin/admin_panel", $data);
    }

    public function add_user()
    {
        if ($this->input->post('ajax') == 1) {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('phone'),
                'password' => "hdijnaosdn" . $this->input->post('username')
            );
            $data ['id'] = $this->user_model->add_user($data);
            echo (json_encode($data));
        }
    }

}
