<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attr_group extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('attr_group_model', 'attribute_model'));
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $per_page = 20;
        $attr_groups = $this->attr_group_model->get_by_pagination($page, $per_page, '', 'id DESC');
        $config = array(
            'url'=>'admin/attr_group',
            'per-page' => $per_page,
            'total' => $this->attr_group_model->count()
        );

        $data_temp['content'] = array(
            'attr_groups'=>$attr_groups,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý nhóm thuộc tính';
        $this->template->load_admin_view('catalog/attr_group', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(

            );
            $data['tag_title'] = 'Quản lý nhóm thuộc tính';
            $this->template->load_admin_view('catalog/attr_group_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();

            $this->attr_group_model->insert($post_array);

            redirect('admin/attr_group');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/attr_group');

            $data_temp['content'] = array(
                'attr_group'=>$this->attr_group_model->get_id($id)
            );
            $data['tag_title'] = 'Quản lý nhóm thuộc tính';
            $this->template->load_admin_view('catalog/attr_group_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            $this->attr_group_model->update($post_array['id'], $post_array);
            redirect('admin/attr_group');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/attr_group');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->attr_group_model->delete($id);
            redirect('admin/attr_group');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/attr_group');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->attr_group_model->delete($key);
            }
            redirect('/admin/attr_group');
        }
    }
}