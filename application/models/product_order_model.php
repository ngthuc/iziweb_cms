<?php
class Product_order_model extends Base_model {
    public $table_name = 'product_order';

    public function get($where = '', $order = '')
    {
    	$this->db->select('product.name as product_name, product_order.quantity, product.sale as unit_price');
    	$this->db->join('product', 'product_order.product_id = product.id');
        if ($where != '') $this->db->where($where);
        if ($order != '') $this->db->order_by($order);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_top_sale() {
        $this->db->select('product_order.product_id AS product_id, product.name AS product_name, SUM(total) AS sum_total');
        $this->db->join('product', 'product_order.product_id = product.id');
        $this->db->group_by('product_id');
        $this->db->order_by('sum_total DESC');
        $this->db->limit(10);
        return $this->db->get($this->table_name)->result_array();
    }
}