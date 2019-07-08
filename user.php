<?php
//本文件是专供全局调用的user相关功能，与api目录下的作区别
require_once "model/mysql.php";
//include "curl.php";

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx5605c20f0f64066e&secret=9b1e69c2a8b1a6ccfb5ee23a37b82e9a&js_code={$js_code}&grant_type=authorization_code";
    require_once("./curl.php");
    $result = getToken($url);
    //$_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    return json_decode($result);
    //echo $_SESSION['openID'];
}