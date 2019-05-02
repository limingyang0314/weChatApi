<?php
$GLOBALS['base_url'] = 'https://wechatmore.xyz:666/';
$GLOBALS['app_key'] = 'wxc24a817201be0ebc';
$GLOBALS['db_host'] = 'localhost';
$GLOBALS['db_user'] = 'root';
$GLOBALS['db_pw'] = 'dawangba1';
$GLOBALS['db_name'] = 'WeChatApi';

$conn = mysqli_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pw'], $GLOBALS['db_name']);
mysqli_query($conn,'set names utf8');
$GLOBALS['conn'] = $conn;
$conn_obj = new mysqli($GLOBALS['db_host'],$GLOBALS['db_user'],$GLOBALS['db_pw'],$GLOBALS['db_name']);
$conn_obj->query('set names utf8');
$GLOBALS['conn_obj'] = $conn_obj;

function getDataAsArray($temp){
    $result = [];
    if(!$temp || is_bool($temp)){
        return $result;
    }
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
    }else{
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

        if($count < $num){
            $b .= "?,";
        }else{
            $b .= "?)";
        }
    }

    var_dump($params);
    $sql = $sql . $a .$b;
    echo $sql;
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

    $result = mysqli_query($GLOBALS['conn'], $sql);
    $result = getDataAsArray($result);
    if(!empty($result)){
        $result = $result[0];
    }else{
        $result = array();
    }
    return $result;
}

function decode($secretID){
    //echo $secretID;
    //echo "<br>";
    $array = str_split($secretID);
    $num = count($array);
    $result = '';
    for($i = 0 ; $i < $num - 5; $i ++){

        $temp = $array[$num - $i - 6];
        //echo $temp;
        $tempResult = ord($temp) - 1;
        $tempResult = chr($tempResult);
        $result .= $tempResult;
    }
    return $result;
}

if(isset($_GET['secret_key'])){
    $_GET['openID'] = decode($_GET['secret_key']);
    $GLOBALS['openID'] = decode($_GET['secret_key']);
}