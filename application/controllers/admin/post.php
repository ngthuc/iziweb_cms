<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('topic_model', 'post_model'));
        $this->load->helper('topic_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($topic = 0, $page = 1) {
        $per_page = 20;
        $where = "post_type = 'post'";
        if ($topic != 0) $where .= " AND topic_id = $topic";

        $topics = $this->topic_model->get();
        $posts = $this->post_model->get_by_pagination($page, $per_page, $where, 'post.id DESC');
        $config = array(
            'url' => 'admin/page',
            'per-page' => $per_page,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'topic'=>$topic,
            'topics'=>$topics,
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý bài viết';
        $this->template->load_admin_view('article/post', $data_temp, $data);
    }

    public function search($key = '', $page = 1) {
        $per_page = 20;
        $where = "post_type = 'post' AND title LIKE '%".$key."%'";
        $posts = $this->post_model->get_by_pagination($page, $per_page, $where, 0, 'post.id DESC');
        $topics = $this->topic_model->get();
        $config = array(
            'url' => ('admin/post/search/'.$key),
            'per-page' => $per_page,
            'total' => $this->post_model->count($where)
        );

        $data_temp['content'] = array(
            'topics'=>$topics,
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý bài viết';
        $this->template->load_admin_view('article/post', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'topics' => $this->topic_model->get()
            );
            $data['tag_title'] = 'Quản lý bài viết';
            $this->template->load_admin_view('article/post_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();
            $post_array['post_type'] = 'post';

            $this->post_model->insert($post_array);
            redirect('admin/post');
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/post');
            $data_temp['content'] = array(
                'post'=>$this->post_model->get_id($id)
            );
            $data['tag_title'] = 'Quản lý bài viết';
            $this->template->load_admin_view('article/post_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();

            $this->post_model->update($post_array['id'], $post_array);
            redirect('admin/post');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/post');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->post_model->delete($id);
            redirect('admin/post');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/post');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->post_model->delete($key);
            }
            redirect('/admin/post');
        }
    }
}