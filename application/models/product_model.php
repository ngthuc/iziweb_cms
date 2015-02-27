<?php
class Product_model extends Base_model {
    public $table_name = 'product';

    public function get_by_top($offset = 0, $limit = 1, $where = '', $order = '')
    {
    	$this->db->select('product.id, product.name, product.price, product.sale, product.thumbnail, product.quantity, product.description, product.views, category.name as cat_name');
    	$this->db->join('category', 'product.category_id = category.id');
    	if ($where != '') $this->db->where($where);
        if ($order != '') $this->db->order_by($order);
        $this->db->limit($limit, $offset);
        return $this->db->get('product')->result_array();
    }

    public function get_by_pagination($current_page = 1, $page_size = 1, $where = '', $order = '')
    {
        $offset = ($current_page - 1)*$page_size;
        return $this->get_by_top($offset, $page_size, $where, $order);
    }
}