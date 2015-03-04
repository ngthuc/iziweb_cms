<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('menu_model', 'category_model', 'topic_model', 'post_model'));
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {

        $data_temp['content'] = array(

        );
        $data['tag_title'] = 'Quản lý đơn đặt hàng';
        $this->template->load_admin_view('web/menu', $data_temp, $data);
    }

    public function view($id = '') {
        if ($id == '') redirect('admin/order');
        $order = $this->order_model->get_id($id);
        if (!$order) redirect('admin/order');
        $products_order = $this->product_order_model->get("order_id = $id");

        $data_temp['content'] = array(
            'order'=>$order,
            'products_order'=>$products_order
        );
        $data['tag_title'] = 'Chi tiết đơn hàng';
        $this->template->load_admin_view('sale/order_detail', $data_temp, $data);
    }

    public function check_out($id = '', $token = '') {
        if ($id == '') redirect('admin/order');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $order = $this->order_model->get_id($id);
            $order['status'] = 0;
            $this->order_model->update($id, $order);
            redirect('admin/order');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/order');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->order_model->delete($id);
            $this->product_order_model->delete_where("order_id = $id");
            redirect('admin/order');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/order');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->order_model->delete($key);
                $this->product_order_model->delete_where("order_id = $key");
            }
            redirect('/admin/order');
        }
    }
}