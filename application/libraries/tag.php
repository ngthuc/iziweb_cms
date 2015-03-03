<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag {

    public function __construct()
    {

    }

    function make_tag($tag_array = array(), $post_id)
    {
        $CI =& get_instance();
        $CI->load->model(array('tag_model', 'post_model', 'post_tag_model'));
        /***** foreach item, add into database, then make table foreign key *****/
        if (!empty($tag_array)) foreach ($tag_array as $item)
        {
            // check if tag exist in database
            $exist_tags = $CI->tag_model->get("name = '$item'",'');
            if (!empty($exist_tags))
            {
                $exist_tag = $exist_tags[0];
                // increase count_used then update
                $exist_tag['count_used'] += 1;
                $tag_id = $exist_tag['id'];
                $CI->tag_model->update($tag_id, $exist_tag);
            }
            else
            {
                // add into db
                $tag_id = $CI->tag_model->insert(array('name' => $item, 'slug' => link_title($item)));
            }

            // make table foreign key
            $CI->post_tag_model->insert(array('post_id' => $post_id, 'tag_id' => $tag_id));
        }
    }

    function delete_tag($post_id)
    {
        $CI =& get_instance();
        $CI->load->model(array('tag_model', 'post_model', 'post_tag_model'));

        $post_tag_array = $CI->post_tag_model->get("post_id = $post_id");
        if (!empty($post_tag_array)) foreach ($post_tag_array as $item)
        {
            $CI->post_tag_model->delete($item['id']);
            // decrease count_used in tag table, if count_used == 0 then delete
            $tag_item = $CI->tag_model->get_id($item['tag_id']);

            if ($tag_item['count_used'] <= 1) $CI->tag_model->delete($tag_item['id']);
            else
            {
                $tag_item['count_used'] -= 1;
                $CI->tag_model->update($tag_item['id'], $tag_item);
            }
        }
    }
}