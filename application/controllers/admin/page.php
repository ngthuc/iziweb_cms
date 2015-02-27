<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('topic_model', 'post_model'));
        $this->load->helper('topic_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $per_page = 20;
        $where = "post_type = 'page'";
        $posts = $this->post_model->get_by_pagination($page, $per_page, $where, 'post.id DESC');
        $config = array(
            'url' => 'admin/page',
            'per-page' => $per_page,
            'total' => $this->post_model->count()
        );

        $data_temp['content'] = array(
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý trang';
        $this->template->load_admin_view('article/page', $data_temp, $data);
    }

    public function search($key = '', $page = 1) {
        $per_page = 20;
        $where = "post_type = 'page' AND post.name LIKE '%".$key."%'";
        $posts = $this->post_model->get_by_pagination($page, $per_page, $where, 0, 'post.id DESC');
        $topics = $this->topic_model->get();
        $config = array(
            'url' => ('admin/post/search/'.$key),
            'per-page' => $per_page,
            'total' => $this->post_model->count($where)
        );

        $data_temp['content'] = array(
            'cat'=>'',
            'topics'=>$topics,
            'posts'=>$posts,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý trang';
        $this->template->load_admin_view('article/page', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'topics' => $this->topic_model->get(),
                'attr_group' => $this->attr_group_model->get()
            );
            $data['tag_title'] = 'Quản lý sản phẩm';
            $this->template->load_admin_view('catalog/post_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();
            if (isset($post_array['img'])) {
                $img = $post_array['img'];
                unset($post_array['img']);
            }
            if (isset($post_array['attr'])) {
                $attr = $post_array['attr'];
                unset($post_array['attr']);
            }

            $this->post_model->insert($post_array);
            $id = $this->db->insert_id();

            if (isset($img)) foreach ($img as $item) {
                $this->post_img_model->insert(array('post_id'=>$id, 'path'=>$item));
            }

            if (isset($attr)) foreach ($attr as $key=>$value) {
                $this->post_attr_model->insert(array('post_id'=>$id, 'attr_id'=>$key, 'value'=>$value));
            }

            redirect('admin/post');
        }
    }

    public function ajax_get_attr() {
        $attributes = $this->attribute_model->get('attr_group_id='.$this->input->post('attr_group_id'));
        foreach ($attributes as $item) {
            echo $this->attr_form($item);
        }
    }

    public function attr_form($attr) {
        return
        '<div class="form-group">
            <label class="col-sm-3 control-label">'.$attr['name'].':</label>
            <div class="col-sm-8">
                <input type="text" name="attr['.$attr['id'].']" placeholder="'.$attr['name'].'" class="form-control">
            </div>
        </div>';
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/post');
            $post_img = $this->post_img_model->get_post_img($id);
            $post_attr = $this->post_attr_model->get_post_attr($id);
            $data_temp['content'] = array(
                'post'=>$this->post_model->get_id($id),
                'topics'=>$this->topic_model->get(),
                'post_img'=>$post_img,
                'post_attr'=>$post_attr
            );
            $data['tag_title'] = 'Quản lý sản phẩm';
            $this->template->load_admin_view('catalog/post_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if (isset($post_array['img'])) {
                $img = $post_array['img'];
                unset($post_array['img']);
            }
            if (isset($post_array['attr'])) {
                $attr = $post_array['attr'];
                unset($post_array['attr']);
            }
            // delete old post images then insert new
            $this->post_img_model->delete_post_img($post_array['id']);
            if (isset($img)) foreach ($img as $item) {
                $this->post_img_model->insert(array('post_id'=>$post_array['id'], 'path'=>$item));
            }

            // update post attributes
            if (isset($attr)) foreach ($attr as $key=>$value) {
                $this->post_attr_model->update($key, array('value'=>$value));
            }

            $this->post_model->update($post_array['id'], $post_array);

            redirect('admin/post');
        }
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/post');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->post_model->delete($id);
            $this->post_attr_model->delete_post_id($id);
            $this->post_img_model->delete_post_id($id);
            redirect('admin/post');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/post');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->post_model->delete($key);
                $this->post_attr_model->delete_post_id($key);
                $this->post_img_model->delete_post_id($key);
            }
            redirect('/admin/post');
        }
    }
}