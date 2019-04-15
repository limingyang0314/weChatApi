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

$conn = mysqli_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pw'], $GLOBALS['db_name']);
mysqli_query($conn,'set names utf8');
$GLOBALS['conn'] = $conn;
$conn_obj = new mysqli($GLOBALS['db_host'],$GLOBALS['db_name'],$GLOBALS['db_pw'],$GLOBALS['db_name']);
$conn_obj->query('set names utf8');
$GLOBALS['conn_obj'] = $conn_obj;

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

function get_lastOne($table_name,$conditions){
    if(is_string($conditions)){
        $sql = "SELECT * FROM $table_name WHERE $conditions ORDER BY time DESC LIMIT 0,1";
    }else if(is_array($conditions)){
        $where = "WHERE ";
        $num = count($conditions);
        $count = 0;
        foreach($conditions as $key => $value){
            $count ++;
            $WHERE .= " $key = $value ";
            if($count < $num){
                $WHERE .= "AND ";
            }
        }
    }
    //echo $sql;

    $result = mysqli_query($GLOBALS['conn'], $sql);
    $result = getDataAsArray($result);

    //var_dump($result);
    if(!empty($result)){
        $result = $result[0];
    }else{
        $result = array();
    }
    return $result;
}