<?php
class Product_attr_model extends Base_model {
    public $table_name = 'product_attr';

    public function get_product_attr($product_id) {
    	$this->db->select('product_attr.id as id, product_attr.value as value, attribute.name as attr_name');
    	$this->db->join('attribute', 'attribute.id = product_attr.attr_id');
    	$this->db->where('product_id', $product_id);
        return $this->db->get($this->table_name)->result_array();
    }

    public function delete_product_attr($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete($this->table_name);
    }
}