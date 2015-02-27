<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }
        // $this->output->enable_profiler(TRUE);
        $this->load->model(array('attr_group_model', 'attribute_model'));
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($attr_group = 0, $page = 1) {
        $per_page = 20;
        $attributes = $this->attribute_model->get_by_pagination($page, $per_page, ($attr_group == 0?'':"attr_group_id = $attr_group"), 'id DESC');
        if ($attr_group == 0) {
            $config = array(
                'url'=>'admin/attribute',
                'per-page' => $per_page,
                'total' => $this->attribute_model->count()
            );
        }
        else {
            $config = array(
                'url'=>'admin/attribute/attr_group/'.$attr_group,
                'per-page' => $per_page,
                'total' => $this->attribute_model->count("attr_group_id = $attr_group")
            );
        }

        $data_temp['content'] = array(
            'attr_groups'=>$this->attr_group_model->get(),
            'attr_group'=>$attr_group,
            'attributes'=>$attributes,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý thuộc tính';
        $this->template->load_admin_view('catalog/attribute', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'attr_groups' => $this->attr_group_model->get()
            );
            $data['tag_title'] = 'Quản lý thuộc tính';
            $this->template->load_admin_view('catalog/attribute_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();

            $this->attribute_model->insert($post_array);

            redirect('admin/attribute');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/attribute');

            $data_temp['content'] = array(
                'attribute' => $this->attribute_model->get_id($id),
                'attr_groups' => $this->attr_group_model->get()
            );
            $data['tag_title'] = 'Quản lý thuộc tính';
            $this->template->load_admin_view('catalog/attribute_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            $this->attribute_model->update($post_array['id'], $post_array);
            redirect('admin/attribute');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/attribute');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->attribute_model->delete($id);
            redirect('admin/attribute');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/attribute');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->attribute_model->delete($key);
            }
            redirect('/admin/attribute');
        }
    }
}