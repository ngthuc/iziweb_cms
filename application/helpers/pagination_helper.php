<?php
/**
 * Created by PhpStorm.
 * User: nhansay
 * Date: 03/02/2015
 * Time: 13:50
 */

function pagination($config = array(), $current = 1) {
    if (empty($config)) return '';
    if ($config['url'] == '') return '';
    if ($config['per-page'] >= $config['total']) return '';
    $url = BASE_URL.$config['url'];

    $result='';
    if($current != 1)
    {
        $result = li_anchor($url, 'First').li_anchor($url.'/page/'.($current - 1), '« Previous');
    }
    for($i = 1; $i <= ceil($config['total']/$config['per-page']); $i++)
    {
        if($i == $current) $result .= li_anchor($url, $i, true);
        else
        {
            $result .= li_anchor($url."/page/$i", $i);
        }

    }
    if($current != ceil($config['total']/$config['per-page']))
    {
        $result .= li_anchor($url.'/page/'.($current+1), 'Next »').li_anchor($url.'/page/'.ceil($config['total']/$config['per-page']), 'Last');
    }
    return $result;
}

function li_anchor($link, $title, $is_active=false) {
    if (!$is_active) return '<li>'.anchor($link, $title).'</li>';
    else return '<li class="active">'.anchor($link, $title).'</li>';
}