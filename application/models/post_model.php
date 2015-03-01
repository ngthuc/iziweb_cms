<?php
class Post_model extends Base_model {
    public $table_name = 'post';

    public function get_by_top($offset = 0, $limit = 1, $where = '', $order = '')
    {
        $this->db->select('post.id, post.title, post.post_date, post.author, post.thumbnail, post.excerpt, post.status, post.content, post.views, post.topic_id, topic.name as topic_name');
        $this->db->join('topic', 'post.topic_id = topic.id');
        if ($where != '') $this->db->where($where);
        if ($order != '') $this->db->order_by($order);
        $this->db->limit($limit, $offset);
        return $this->db->get('post')->result_array();
    }

    public function get_by_pagination($current_page = 1, $page_size = 1, $where = '', $order = '')
    {
        $offset = ($current_page - 1)*$page_size;
        return $this->get_by_top($offset, $page_size, $where, $order);
    }
}