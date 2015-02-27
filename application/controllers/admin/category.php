<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model('category_model');
        $this->load->helper('category_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $per_page = 20;
        $categories = $this->category_model->get_by_pagination($page, $per_page);
        $config = array(
            'url' => 'admin/category',
            'per-page' => $per_page,
            'total' => $this->category_model->count()
        );

        $data_temp['content'] = array(
            'categories'=>$categories,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý danh mục';
        $this->template->load_admin_view('catalog/category', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean|is_unique[category.name]');
        $this->form_validation->set_rules('slug', 'Đường dẫn', 'trim|xss_clean');
        $this->form_validation->set_rules('parent_id', 'Danh mục cha', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_title', 'Thẻ tiêu đề', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_description', 'Thẻ mô tả', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_keywords', 'Thẻ từ khóa', 'trim|xss_clean');
        $this->form_validation->set_rules('status', 'Trạng thái', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'categories' => $this->category_model->get()
            );
            $data['tag_title'] = 'Quản lý danh mục';
            $this->template->load_admin_view('catalog/category_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();
            if ($post_array['slug'] == '') $post_array['slug'] = link_title($post_array['name']);
            $this->category_model->insert($post_array);
            redirect('admin/category');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean|callback_check_unique');
        $this->form_validation->set_rules('slug', 'Đường dẫn', 'trim|xss_clean');
        $this->form_validation->set_rules('parent_id', 'Danh mục cha', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_title', 'Thẻ tiêu đề', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_description', 'Thẻ mô tả', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_keywords', 'Thẻ từ khóa', 'trim|xss_clean');
        $this->form_validation->set_rules('status', 'Trạng thái', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/category');
            $data_temp['content'] = array(
                'category'=>$this->category_model->get_id($id),
                'categories'=>$this->category_model->get('id!='.$id)
            );
            $data['tag_title'] = 'Quản lý danh mục';
            $this->template->load_admin_view('catalog/category_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if ($post_array['slug'] == '') $post_array['slug'] = link_title($post_array['name']);
            $this->category_model->update($post_array['id'], $post_array);

            redirect('admin/category');
        }
    }

    public function check_unique($name) {
        $category = $this->category_model->get_id($this->input->post('id'));
        if ($name != $category['name'] && $this->category_model->count('name=\''.$name.'\'')) {
            $this->form_validation->set_message('check_unique', 'Danh mục đã tồn tại!');
            return false;
        }
        return true;
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/category');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->category_model->delete($id);
            redirect('admin/category');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/category');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->category_model->delete($key);
            }
            redirect('/admin/category');
        }
    }
}