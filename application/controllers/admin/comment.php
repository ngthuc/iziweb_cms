<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('comment_model', 'product_model', 'customer_model'));
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($page = 1) {
        $per_page = 20;
        $comments = $this->comment_model->get_by_pagination($page, $per_page, '', 'id DESC');
        $config = array(
            'url'=>'admin/comment',
            'per-page' => $per_page,
            'total' => $this->comment_model->count()
        );

        $data_temp['content'] = array(
            'comments'=>$comments,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý bình luận';
        $this->template->load_admin_view('sale/comment', $data_temp, $data);
    }

    public function delete($id = '', $token = '') {
        if ($id == '') redirect('admin/comment');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $this->comment_model->delete($id);
            redirect('admin/comment');
        }
    }

    public function approve($id = '', $token = '') {
        if ($id == '') redirect('admin/comment');
        if ($token != $this->security->get_csrf_hash()) show_404();
        else {
            $comment = $this->comment_model->get_id($id);
            $comment['status'] = 1;
            $this->comment_model->update($id, $comment);
            redirect('admin/comment');
        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/comment');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->comment_model->delete($key);
            }
            redirect('/admin/comment');
        }
    }
}