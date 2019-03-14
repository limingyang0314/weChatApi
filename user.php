<?php
include "model/mysql.php";
//include "curl.php";

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx82ddf3eeb1f22ae2&secret=9a6c520ec952738d4c3f7bd4ea096446&js_code={$js_code}&grant_type=authorization_code";
    require_once("curl.php");
    $result = getToken($url);
    session_start();
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    echo $result;
    //echo $_SESSION['openID'];
}

function get_user_info($openID, $conn){
    $sql = "SELECT U.openID, U.username,U.avatar, L.location_name, S.school_name FROM users U, locations L, schools S WHERE U.openID = '{$openID}' AND L.location_id = U.location_id AND S.sID = U.school_id";
    $sql = "SELECT * FROM users WHERE openID = '1111'";
    if (mysqli_connect_errno($conn)) { 
        echo "连接 MySQL 失败: " . mysqli_connect_error(); 
    } 

    //echo $sql;
    //$conn = mysqli_connect('localhost', 'root', 'dawangba1', 'wechatapi');
    $result = mysqli_select_db($conn,$sql);
    //$result = $conn->query($sql);
    //$result = getDataAsArray($result);
    $err = mysqli_error($conn);
    var_dump($err);
    return $result;
}