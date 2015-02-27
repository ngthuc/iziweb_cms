<?php
class Product_img_model extends Base_model {
    public $table_name = 'product_img';

    public function get_product_img($product_id) {
        $this->db->select('path');
        $this->db->where('product_id', $product_id);
        return $this->db->get($this->table_name)->result_array();
    }

    public function delete_product_img($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete($this->table_name);
    }
}