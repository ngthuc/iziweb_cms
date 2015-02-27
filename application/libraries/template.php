<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    public function load_view($view = '', $template_region = array(), $data_temp = array(), $data = array()) {
        if ($view == '') return '';

        $CI =& get_instance();
        foreach ($template_region as $key => $value) {
            if (isset($data_temp[$key])) {
                $temp[$key] = $CI->load->view($value, $data_temp[$key], TRUE);
            }
            else {
                $temp[$key] = $CI->load->view($value, NULL, TRUE);
            }
        }

        $CI->load->view($view, array_merge($data, $temp));
    }

    public function load_admin_view($page, $data_temp = array(), $data = array()) {
        $template_region = array(
            'header'=>'admin/header',
            'left'=>'admin/left',
            'content'=>'admin/content/'.$page,
            'footer'=>'admin/footer'
        );
        $view = 'admin_template';

        $this->load_view($view, $template_region, $data_temp, $data);
    }
}