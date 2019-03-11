<?php
function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx82ddf3eeb1f22ae2&secret=9a6c520ec952738d4c3f7bd4ea096446&js_code={$js_code}&grant_type=authorization_code";
    require_once("./curl.php");
    $result = getToken($url);
    echo $result;
}