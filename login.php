<?php
require_once "middle/session.php";
require_once "model/mysql.php";
if(isset($_POST['code'])){
    $js_code = $_POST['code'];
    //session_start();
    require_once "user.php";
    $session_obj = get_openID($js_code);
    $_SESSION['openID'] = $session_obj->openID;
    $_SESSION['session_key'] = $session_obj->session_key;
    $openID = $_SESSION['openID'];

    $sql = "SELECT * FROM users WHERE openID = {$openID}";


    $username = $user_info['username'] = $_POST['username'];
    $avatar  = $user_info['avatar'] = $_POST['avatar'];
    $user_info['openID'] = $openID;
    $session_key = $user_info['session_key'] = $session_obj->session_key;



    $result = mysqli_query($conn, $sql);
    if($result){

    }else{
        $sql = "INSERT INTO users (openID,username,avatar,session_key) 
        VALUES ('{$openID}','{$username}','{$avatar}','{$session_key}')";
    }

}