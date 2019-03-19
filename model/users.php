<?php
require_once "mysql.php";

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&js_code={$js_code}&grant_type=authorization_code";
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

function login($openID){
    session_start();
    $_SESSION['openID'] = $openID;
    // if(isset($_SESSION['openID'])){
    //     echo "openID is " . $_SESSION['openID'] . "<br>";
    // }else{
    //     echo "not login!<br>";
    // }
}

/*
**是否选择了学校的验证
*/
function is_select_school(){

}