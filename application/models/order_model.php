<?php
class Order_model extends Base_model {
    public $table_name = 'order';

    public function get_new_order_amount() {
        $this->db->select_sum('amount');
        $this->db->where('status = 1');
        $array = $this->db->get('order')->row_array();
        if (empty($array) || !$array['amount']) return 0;
        return $array['amount'];
    }

    public function get_sale_of_day($day) {
        $day_before = date('Y-m-d H:i:s',strtotime($day." -1 days"));
        $this->db->select_sum('amount');
        $this->db->where("order_time <= '$day' AND order_time >= '$day_before'");
        $array = $this->db->get('order')->row_array();
        if (empty($array) || !$array['amount']) return 0;
        return $array['amount'];
    }
}