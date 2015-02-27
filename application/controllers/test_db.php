<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_db extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->base_model->table_name = 'product';
    }

    public function index() {
        $where = "name = 'test san pham'";
        print_r($this->base_model->get($where));
    }

    public function test_csrf() {
        for ($i = 0; $i < 6; $i ++) {
            echo $this->security->get_csrf_hash().'<br>';
        }
    }

}