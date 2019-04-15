<?php
$base_url = 'https://wechatmore.xyz:666/';
$app_key = 'wxc24a817201be0ebc';
$db_host = 'localhost';
$db_user = 'root';
$db_pw = 'dawangba1';
$db_name = 'WeChatApi';

$GLOBALS['base_url'] = $base_url;
$GLOBALS['app_key'] = $app_key;
$GLOBALS['db_host'] = $db_host;
$GLOBALS['db_user'] = $db_user;
$GLOBALS['db_pw'] = $db_pw;
$GLOBALS['db_name'] = $db_name;

$conn_obj = new mysqli("localhost","root","dawangba1","WeChatApi");
$conn_obj->query('set names utf8');
$GLOBALS['conn_obj'] = $conn_obj;

function safe_insert($table_name,$values){
    $conn_obj = $GLOBALS['conn_obj'];
    $sql = "INSERT INTO $table_name ";
    $a = "(";
    $b = " VALUES (";
    $num = count($values);
    $count = 0;
    foreach($values as $key => $value){
        $count ++;
        $a .= $key;
        if($count < $num){
            $a .= ",";
        }else{
            $a .= ")";
        }
    }

    $params = [];
    $count = 0;
    foreach($values as $key => $value){
        $count ++;

        $params[] = $value;

        //echo "nb ";
        //$b .= $value;
        if($count < $num){
            $b .= "?,";
        }else{
            $b .= "?)";
        }
    }

    var_dump($params);
    $sql = $sql . $a .$b;
    echo $sql;

    //$result = $conn_obj->prepare($sql);
    //$result->bind_param($pa,$pb);
    //$pa = $params[0];
    //$pa = $params[1];
    //$result->execute();
}

$table_name ='schools';
$values = array('school_name' => '你好', 'location_id' => 1);
safe_insert($table_name,$values);