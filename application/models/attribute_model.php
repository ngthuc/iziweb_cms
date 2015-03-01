<?php
class Attribute_model extends Base_model {
    public $table_name = 'attribute';

    public function get_by_top($offset = 0, $limit = 1, $where = '', $order = '')
    {
        $this->db->select('attribute.id, attribute.name, attribute.default_value, attribute.attr_group_id, attr_group.name as attr_group_name');
        $this->db->join('attr_group', 'attribute.attr_group_id = attr_group.id');
        if ($where != '') $this->db->where($where);
        if ($order != '') $this->db->order_by($order);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_by_pagination($current_page = 1, $page_size = 1, $where = '', $order = '')
    {
        $offset = ($current_page - 1)*$page_size;
        return $this->get_by_top($offset, $page_size, $where, $order);
    }
}