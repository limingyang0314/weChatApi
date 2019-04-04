<?php
include "model/mysql.php";
//include "curl.php";

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&js_code={$js_code}&grant_type=authorization_code";
    require_once("../curl.php");
    $result = getToken($url);
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    return json_decode($result);
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