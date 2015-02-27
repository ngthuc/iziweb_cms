<?php
class Product_attr_model extends Base_model {
    public $table_name = 'product_attr';

    public function get_product_attr($product_id) {
    	$this->db->select('id, value, attr_id, name');
    	$this->db->join('attribute', 'attribute.id = product_attr.attr_id');
    	$this->db->where('product_id', $product_id);
        // $sql = "SELECT product_attr.id as id, product_attr.value as value, attribute.id as attr_id, attribute.name as name FROM product_attr, attribute WHERE product_attr.product_id=$product_id AND product_attr.attr_id=attribute.id";
        return $this->db->get('product_attr')->result_array();
    }

    public function delete_product_id($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('product_attr');
    }
}