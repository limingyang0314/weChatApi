<?php
require_once "mysql.php";
$appID = "wxc24a817201be0ebc";

function getAccessToken(){
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575";

    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    echo $result;
}

function getUserAccessToken($code){
    $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&code=$code&grant_type=authorization_code";
    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    echo $result;
}

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&js_code={$js_code}&grant_type=authorization_code";
    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $temp = json_decode($result);
    //var_dump($temp);
    $_SESSION['openID'] = $temp->openid;//json_decode($result)->openid;
    $_COOKIE['session_key'] = $temp->session_key;
    //echo $_SESSION['openID'];
    //echo "   ".$_COOKIE['session_key']."  ";
    echo $result;
    //echo $_SESSION['openID'];
}

function get_user_info($openID, $conn){
     $sql = "SELECT U.openID, U.username, U.avatar, L.location_name, S.school_name, U.reply_num, U.post_num FROM users U, locations L, schools S WHERE U.openID = '{$openID}' AND L.location_id = U.location_id AND S.sID = U.school_id";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $result = getDataAsArray($result);
    return $result;
}

function login($openID,$session_key){
    session_start();
    $_SESSION['openID'] = $openID;
    $_SESSION['session_key'] = $session_key;
}

/*
**是否选择了学校的验证
*/
function is_select_school($openID,$conn){
    $sql = "SELECT school_id FROM users WHERE openID = '$openID'";
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    $bool = $result[0]->school_id;
    if($bool){
        return true;
    }else{
        return false;
    }
}

