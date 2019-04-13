<?php
$conn = mysqli_connect('localhost', 'root', 'dawangba1', 'wechatapi');
mysqli_query($conn,'set names utf8');

function getDataAsArray($temp){
    $result = [];
    while ($fieldinfo = mysqli_fetch_object($temp)) {
        $result[] = $fieldinfo;
    }
    return $result;
}

function check_session($session_key,$conn){
    $sql = "SELECT openID FROM users WHERE session_key = '$session_key'";
    //echo $sql;

    $result = mysqli_query($conn, $sql);
    if($sql){
        $result = getDataAsArray($result);
        $_SESSION['openID'] = $result[0]->openID;
        //setcookie("openID", $result[0]->openID, time()+3600);
        //echo "!!!session ok!!!";
    }else{
        //echo "!!!not ok!!!";
        exit;
    }

}