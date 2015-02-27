<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_type') == 'user')
        {
            redirect('admin');
        }
        $this->load->model('user_model');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|md5|callback_check_user');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/login');
        }
        else {
            redirect('/admin');
        }
    }

    public function check_user($password) {
        $username = $this->input->post('username');
        $where = "username = 'admin' AND password = '$password'";
        $users = $this->user_model->get($where);

        if (sizeof($users) >= 1) {
            $user = $users[0];
            $this->session->set_userdata(array(
                    'user' => 'admin',
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'])
            );
            return true;
        }
        else {
            $this->form_validation->set_message('check_user', 'Sai tên đăng nhập hoặc mật khẩu!');
            return false;
        }
    }
}