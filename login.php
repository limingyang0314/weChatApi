<?php
require_once "middle/session.php";
//require_once "model/mysql.php";
if(isset($_POST['code'])){
    $js_code = $_POST['code'];
    //session_start();
    require_once "user.php";
    $session_obj = get_openID($js_code);

    //返回信息
    $state = array('error_code'=>-1,'message'=>'login success','openID'=>'');

    //如果没有获得openID
    if(!isset($session_obj->openid)){
        $state['error_code'] = $session_obj->errcode;
        $state['message'] = $session_obj->errmsg;
        echo json_encode($state);
        exit;

    }

    $_SESSION['openID'] = $session_obj->openid;
    $_SESSION['session_key'] = $session_obj->session_key;
    $openID = $session_obj->openid;

    $sql = "SELECT * FROM users WHERE openID = '{$openID}'";
    echo $sql;


    $username = $user_info['username'] = $_POST['username'];
    $avatar  = $user_info['avatar'] = $_POST['avatar'];
    $user_info['openID'] = $openID;
    $session_key = $user_info['session_key'] = $session_obj->session_key;
    $location = 1;

    $result = mysqli_query($conn, $sql);


    

    if($result){
        $sql = "UPDATE users SET session_key = '{$session_key}' WHERE openID = '{$openID}'";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        if($result){
            $state['openID'] = $openID;
            echo json_encode($state);
        } else {
            $state['error_code'] = 2;
            $state['message'] = 'login failed';
            echo json_encode($state);
        }

    } else {
        $sql = "INSERT INTO users (openID,username,avatar,session_key,location_id) 
        VALUES ('{$openID}','{$username}','{$avatar}','{$session_key}','{$location}')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $state['openID'] = $openID;
            echo json_encode($state);
        } else {
            $state['error_code'] = 1;
            $state['message'] = 'create user failed';
            echo json_encode($state);

        }

    }

}