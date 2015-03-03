<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model('topic_model');
        $this->load->helper('topic_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $per_page = 20;
        $topics = $this->topic_model->get_by_pagination($page, $per_page);
        $config = array(
            'url' => 'admin/topic',
            'per-page' => $per_page,
            'total' => $this->topic_model->count()
        );

        $data_temp['content'] = array(
            'topics'=>$topics,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý danh mục';
        $this->template->load_admin_view('article/topic', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean|is_unique[topic.name]');
        $this->form_validation->set_rules('slug', 'Đường dẫn', 'trim|xss_clean');
        $this->form_validation->set_rules('parent_id', 'Danh mục cha', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_title', 'Thẻ tiêu đề', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_description', 'Thẻ mô tả', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_keywords', 'Thẻ từ khóa', 'trim|xss_clean');
        $this->form_validation->set_rules('status', 'Trạng thái', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'topics' => $this->topic_model->get()
            );
            $data['tag_title'] = 'Quản lý chủ đề';
            $this->template->load_admin_view('article/topic_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();
            if ($post_array['slug'] == '') $post_array['slug'] = link_title($post_array['name']);
            $this->topic_model->insert($post_array);
            redirect('admin/topic');
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
            if ($id == '') redirect('admin/topic');
            $data_temp['content'] = array(
                'topic'=>$this->topic_model->get_id($id),
                'topics'=>$this->topic_model->get('id != '.$id)
            );
            $data['tag_title'] = 'Quản lý chủ đề';
            $this->template->load_admin_view('article/topic_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if ($post_array['slug'] == '') $post_array['slug'] = link_title($post_array['name']);
            $this->topic_model->update($post_array['id'], $post_array);

            redirect('admin/topic');
        }
    }

    public function check_unique($name) {
        $topic = $this->topic_model->get_id($this->input->post('id'));
        if ($name != $topic['name'] && $this->topic_model->count('name = \''.$name.'\'')) {
            $this->form_validation->set_message('check_unique', 'Chủ đề đã tồn tại!');
            return false;
        }
        return true;
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/topic');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->topic_model->delete($id);
            $this->post_model->delete_where("topic_id = $id");
            redirect('admin/topic');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/topic');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->topic_model->delete($key);
                $this->post_model->delete_where("topic_id = $key");
            }
            redirect('admin/topic');
        }
    }
}