<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function link_title($str)
{
    if(!$str) return false;
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẽ|Ẻ|Ẹ|Ê|Ề|Ế|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Õ|Ỏ|Ọ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ|Ơ|Ờ|Ớ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ũ|Ủ|Ụ|U|Ư|Ừ|Ứ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        '-'=>' ',
    );
    foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    $str=str_replace(',',"",$str);
    $str=str_replace('.','',$str);
    $str=str_replace(':','',$str);
    $str=str_replace(';','',$str);
    $str=str_replace("'",'',$str);
    $str=str_replace('"','',$str);
    $str=str_replace('/','',$str);
    $str=str_replace('!','',$str);
    $str=str_replace('@','',$str);
    $str=str_replace('$','',$str);
    $str=str_replace('%','',$str);
    $str=str_replace('^','',$str);
    $str=str_replace('&','',$str);
    $str=str_replace('*','',$str);
    $str=str_replace('(','',$str);
    $str=str_replace(')','',$str);
    $str=str_replace('=','',$str);
    $str=str_replace('\\','',$str);
    $str=str_replace('[','',$str);
    $str=str_replace(']','',$str);
    $str=str_replace('?','',$str);
    $str=str_replace('>','',$str);
    $str=str_replace('<','',$str);
    $str=str_replace('{','',$str);
    $str=str_replace('}','',$str);
    $str=str_replace('–','-',$str);
    $str=str_replace('---','-',$str);
    $str=str_replace('-–','-',$str);

    $str=strtolower($str);
    return $str;
}

function convert_to_sql_array($array, $attr) {
    if (empty($array)) return '';
    $sqlStr = '(';
    foreach ($array as $item) {
        $sqlStr .= $item["$attr"].',';
    }
    $sqlStr = substr($sqlStr, 0, strlen($sqlStr)-1);
    $sqlStr .= ')';
    return $sqlStr;
}


function post_href($post)
{
    return base_url().link_title($post['title']).'/'.$post['id'];
}

function post_link($post)
{
    return '<a href="'.post_href($post).'">'.$post['title'].'</a>';
}

function topic_href($topic)
{
//    $CI =& get_instance();
//    $CI->load->model('topic_model');
//    $topic = $CI->topic_model->get_id($topic_id);
    if (empty($topic)) return '';
    return link_title($topic['name']);
}

function social_share($link)
{
    $facebook = '<iframe src="//www.facebook.com/plugins/like.php?href='.$link.'&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 150px" allowTransparency="true"></iframe>';
    $google = '<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                    <div class="g-plusone"></div>

                    <!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
                    <script type="text/javascript">
                      window.___gcfg = {lang: \'vi\'};

                      (function() {
                        var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
                        po.src = \'https://apis.google.com/js/platform.js\';
                        var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script>';
    echo '<div style="float: right; margin-right: 10px" class="social-share">'.$facebook.$google.'</div><div class="clear-fix"></div><br>';
}

function facebook_cmt($link = '')
{
    if ($link == '')
    {
        $str = '<div class="fb-comments" data-href="'.base_url().'" data-width="620" data-numposts="20" data-colorscheme="light"></div>';
    }
    else
    {
        $str = '<div class="fb-comments" data-href="'.base_url().$link.'" data-width="600" data-numposts="20" data-colorscheme="light"></div>';
    }
    echo
    '<div class="wrapper">
        <div class="wrapper-header">
            <h6>BÌNH LUẬN CỦA BẠN</h6>
        </div>
        <div class="wrapper-body">
            '.$str.'
        </div>
    </div>';
}