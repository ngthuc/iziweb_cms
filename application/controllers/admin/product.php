<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('user') || $this->session->userdata('user') != 'admin') {
            redirect('/admin/login');
        }

        $this->load->model(array('category_model', 'product_model', 'attr_group_model', 'attribute_model', 'product_attr_model', 'product_img_model'));

        $this->load->helper('category_option');
        $this->form_validation->set_error_delimiters('<p class="error-message">', '</p>');
    }

    public function index($cat = 0, $page = 1) {
        $per_page = 20;
        $products = $this->product_model->get_by_pagination($page, $per_page, ($cat != 0?"product.category_id = $cat":''), 'product.id DESC');
        $categories = $this->category_model->get();
        $config = array(
            'url' => ($cat != 0?"admin/product/cat/$cat":'admin/product'),
            'per-page' => $per_page,
            'total' => $this->product_model->count($cat == 0?'':'category_id = '.$cat)
        );

        $data_temp['content'] = array(
            'cat'=>$cat,
            'categories'=>$categories,
            'products'=>$products,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý sản phẩm';
        $this->template->load_admin_view('catalog/product', $data_temp, $data);
    }

    public function search($key = '', $page = 1) {
        $where = "product.name LIKE '%".$key."%'";
        $per_page = 20;
        $products = $this->product_model->get_by_pagination($page, $per_page, $where, 0, 'product.id DESC');
        $categories = $this->category_model->get();
        $config = array(
            'url' => ('admin/product/search/'.$key),
            'per-page' => $per_page,
            'total' => $this->product_model->count($where)
        );

        $data_temp['content'] = array(
            'cat'=>'',
            'categories'=>$categories,
            'products'=>$products,
            'pagination'=>pagination($config, $page)
        );
        $data['tag_title'] = 'Quản lý sản phẩm';
        $this->template->load_admin_view('catalog/product', $data_temp, $data);
    }

    public function add_new() {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');
        $this->form_validation->set_rules('price', 'Giá', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data_temp['content'] = array(
                'categories' => $this->category_model->get(),
                'attr_group' => $this->attr_group_model->get()
            );
            $data['tag_title'] = 'Quản lý sản phẩm';
            $this->template->load_admin_view('catalog/product_form', $data_temp, $data);
        }
        else {
            // add new
            $post_array = $this->input->post();
            if ($post_array['sale'] == '') $post_array['sale'] = $post_array['price'];
            if (isset($post_array['img'])) {
                $img = $post_array['img'];
                unset($post_array['img']);
            }
            if (isset($post_array['attr'])) {
                $attr = $post_array['attr'];
                unset($post_array['attr']);
            }

            $this->product_model->insert($post_array);
            $id = $this->db->insert_id();

            if (isset($img)) foreach ($img as $item) {
                $this->product_img_model->insert(array('product_id'=>$id, 'path'=>$item));
            }

            if (isset($attr)) foreach ($attr as $key=>$value) {
                $this->product_attr_model->insert(array('product_id'=>$id, 'attr_id'=>$key, 'value'=>$value));
            }

            redirect('admin/product');
        }
    }

    public function ajax_get_attr() {
        $attributes = $this->attribute_model->get('attr_group_id = '.$this->input->post('attr_group_id'));
        foreach ($attributes as $item) {
            echo $this->attr_form($item);
        }
    }

    public function attr_form($attr) {
        return
        '<div class="form-group">
            <label class="col-sm-3 control-label">'.$attr['name'].':</label>
            <div class="col-sm-7">
                <input type="text" name="attr['.$attr['id'].']" placeholder="'.$attr['name'].'" value="'.$attr['default_value'].'" class="form-control">
            </div>
        </div>';
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('name', 'Tên', 'trim|required|xss_clean');
        $this->form_validation->set_rules('price', 'Giá', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            if ($id == '') redirect('admin/product');
            $product_img = $this->product_img_model->get_product_img($id);
            $product_attr = $this->product_attr_model->get_product_attr($id);
            $data_temp['content'] = array(
                'product'=>$this->product_model->get_id($id),
                'categories'=>$this->category_model->get(),
                'product_img'=>$product_img,
                'product_attr'=>$product_attr
            );
            $data['tag_title'] = 'Quản lý sản phẩm';
            $this->template->load_admin_view('catalog/product_edit', $data_temp, $data);
        }
        else {
            // submit editing
            $post_array = $this->input->post();
            if ($post_array['sale'] == '') $post_array['sale'] = $post_array['price'];
            if (isset($post_array['img'])) {
                $img = $post_array['img'];
                unset($post_array['img']);
            }
            if (isset($post_array['attr'])) {
                $attr = $post_array['attr'];
                unset($post_array['attr']);
            }
            // delete old product images then insert new
            $this->product_img_model->delete_product_img($post_array['id']);
            if (isset($img)) foreach ($img as $item) {
                $this->product_img_model->insert(array('product_id'=>$post_array['id'], 'path'=>$item));
            }

            // update product attributes
            if (isset($attr)) foreach ($attr as $key=>$value) {
                $this->product_attr_model->update($key, array('value'=>$value));
            }

            $this->product_model->update($post_array['id'], $post_array);

            redirect('admin/product');
        }
    }

    public function delete($id = '', $token = '') {
        echo $token;
        echo '<br>'.var_dump($this->session->userdata('ci_session'));
//        if ($id == '') redirect('admin/product');
//        if ($token != $this->session->userdata("token")) show_404();
//        else {
//            $this->product_model->delete($id);
//            $this->product_attr_model->delete_product_attr($id);
//            $this->product_img_model->delete_product_img($id);
//            redirect('admin/product');
//        }
    }

    public function mass_action() {
        $action = $this->input->post('action', true);
        if ($action == '') redirect('admin/product');
        if ($action == 'delete') {
            foreach ($this->input->post('check') as $key=>$value) {
                $this->product_model->delete($key);
                $this->product_attr_model->delete_product_attr($key);
                $this->product_img_model->delete_product_img($key);
            }
            redirect('admin/product');
        }
    }
}