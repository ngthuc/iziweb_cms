<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Count_online extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('online_model'));
    }

    public function index() {
        $time = time();
        $time_check = $time - 600;
        $session = $this->session->userdata('session_id');
        $exist_session = $this->online_model->get("session = '$session'");
        if (empty($exist_session)) {
            // insert a session
            $online = array('session' => $session, 'on_time' => $time);
            $this->online_model->insert($online);
        }
        else {
            // update this session
            $exist_session[0]['on_time'] = $time;
            $this->online_model->update($exist_session[0]['id'], $exist_session[0]);
        }
        // delete all time out sessions (10m)
        $this->online_model->delete_where("on_time < $time_check");
    }
}