<?php
include "mysql.php";

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
     $sql = "SELECT U.openID, U.username, U.avatar, L.location_name, S.school_name FROM users U, locations L, schools S WHERE U.openID = '{$openID}' AND L.location_id = U.location_id AND S.sID = U.school_id";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $result = getDataAsArray($result);
    return $result;
}