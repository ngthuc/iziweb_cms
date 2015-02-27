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
}