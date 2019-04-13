<?php
require_once "model/mysql.php";

//检查是否选择过了学校，如果选择过了就返回校名和true状态，否则返回false状态
function check_school($openID,$conn){
    $state = array('error_code' => -1 ,'state' =>true,'school_name' => null,'school_id' => null);
    $sql = "SELECT S.school_name 
    FROM users U, schools S 
    WHERE openID = '{$openID}' 
    AND S.sID = U.school_id";
    //echo $sql;

    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    
    if(empty($result)){
        $state['error_code'] = 5;
        $state['state'] = false;
        echo json_encode($state);
        exit;
    }
    
    //var_dump($result);
    $state['school_name'] = $result[0]->school_name;
    $state['school_id'] = $result[0]->school_id;
    echo json_encode($state);
    exit;
}

function set_school($openID,$school_id,$conn){
    $state = array('error_code' => -1 ,'state' =>true,'message' => null);
    $sql = "UPDATE users SET school_id = {$school_id}";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $sql = "SELECT school_id FROM users WHERE openID = '$openID'";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);

    
    if($result[0]->school_id == $school_id){
        echo json_encode($state);
        exit;
    }else{
        $state['error_code'] = 7;
        $state['state'] = false;
        echo json_encode($state);
        exit;

    }

}

function get_school($location_id,$conn){
    $sql = "SELECT * FROM schools WHERE location_id = $location_id";
    //echo $sql;
    $result = getDataAsArray(mysqli_query($conn,$sql));
    echo json_encode($result);
    exit;

}

function get_location($conn){
    $sql = "SELECT * FROM locations";
    $result = getDataAsArray(mysqli_query($conn,$sql));
    echo json_encode($result);
    exit;
}

if(isset($_GET['action'])){
    if($_GET['action'] == 'check_school'){
        //echo "session_key = {$_COOKIE['session_key']} openID = {$_COOKIE['openID']} ";
        check_session($_COOKIE['session_key'],$conn);
        check_school($_COOKIE['openID'],$conn);
    }

    if($_GET['action'] == 'set_school'){
        check_session($_COOKIE['session_key'],$conn);
        set_school($_COOKIE['openID'],$_POST['school_id'],$conn);
    }

    if($_GET['action'] == 'get_school'){
        get_school($_GET['location_id'],$conn);

    }

    if($_GET['action'] == 'get_location'){
        get_location($conn);
    }

}