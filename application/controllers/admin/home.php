<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }
    }

    public function index() {

        $data_temp['content'] = array(

        );

        $data['tag_title'] = 'Trang chủ';

        $this->template->load_admin_view('home', $data_temp, $data);
    }


}