<?php
class Base_model extends CI_Model {

	public $table_name = '';
	
    public function __construct()
    {
        parent::__construct();
    }
    
	public function count($where = '')
    {
        if ($where != '') $this->db->where($where);
    	return $this->db->get($this->table_name)->num_rows();
    }

    public function get_id($id = '')
    {
        if ($id == '') return false;
        return $this->db->get_where($this->table_name, array('id' => $id))->row_array();
    }

    public function get($where = '', $order = '')
    {
        if ($where != '') $this->db->where($where);
        if ($order != '') $this->db->order_by($order);
        return $this->db->get($this->table_name)->result_array();
    }

    public function get_by_top($offset = 0, $limit = 1, $where = '', $order = '')
    {
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

    public function insert($array = array())
    {
        if (!empty($array))
        {
            $this->db->insert($this->table_name, $array);
            return $this->db->insert_id();
        }
        return false;
    }

    public function update($id = '', $array = '')
    {
        if ($id == '' || empty($array)) return false;
    	$this->db->where('id', $id);
        return $this->db->update($this->table_name, $array);
    }

    public function delete($id = '')
    {
        if ($id == '') return false;
    	$this->db->where('id', $id);
        return $this->db->delete($this->table_name);
    }
}