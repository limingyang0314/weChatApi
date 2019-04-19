<?php
require_once "middle/session.php";
//require_once "model/mysql.php";
if(isset($_POST['code'])){
    $time = date("Y-m-d H:i:s",time() + 28800);
    //echo $time;
    //exit;
    //echo "nb";
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
    //$_COOKIE['openID'] = $session_obj->openid;
    //setcookie("session_key", $session_obj->session_key, time()+3600);
    $_SESSION['session_key'] = $session_obj->session_key;
    //$_COOKIE['session_key'] = $session_obj->session_key;
    //setcookie("openID", $session_obj->openid, time()+3600);
    $openID = $session_obj->openid;

    $sql = "SELECT * FROM users WHERE openID = '{$openID}'";
    //echo $sql;


    $username = $user_info['username'] = $_POST['username'];
    $avatar  = $user_info['avatar'] = $_POST['avatar'];
    $user_info['openID'] = $openID;
    $session_key = $user_info['session_key'] = $session_obj->session_key;
    $location = 1;

    $result = getDataAsArray(mysqli_query($conn, $sql));


    //var_dump($result);
    //var_dump($state);
    

    //$time = date("Y-m-d H:i:s",time());
    if(!empty($result)){
        $sql = "UPDATE users 
        SET session_key = '{$session_key}',
        avatar = '{$avatar}',
        username = '{$username}',
        last_login_time = '{$time}' 
        WHERE openID = '{$openID}'";
        //echo $sql;

        //echo $sql;
        $result = mysqli_query($conn, $sql);
        if($result){
            $state['openID'] = $openID;
            $state['last_login_time'] = $time;
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
            $state['last_login_time'] = $time;
            echo json_encode($state);
        } else {
            $state['error_code'] = 1;
            //$state['last_login_time'] = time();
            $state['message'] = 'create user failed';
            echo json_encode($state);

        }

    }
    //$sql = "UPDATE ";

}