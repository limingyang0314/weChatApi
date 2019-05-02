<?php
require_once "model/mysql.php";

//检查是否选择过了学校，如果选择过了就返回校名和true状态，否则返回false状态
function check_school($openID,$conn){
    $state = array('error_code' => -1 ,'state' =>true,'school_name' => null,'school_id' => null);
    $sql = "SELECT S.school_name,S.sID
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
    $state['school_id'] = $result[0]->sID;
    echo json_encode($state);
    exit;
}

function set_school($openID,$school_id,$conn){
    $state = array('error_code' => -1 ,'state' =>true,'message' => null);
    $sql = "UPDATE users SET school_id = {$school_id} WHERE openID = '$openID'";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $sql = "SELECT school_id FROM users WHERE openID = '$openID'";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);

    if(empty($result)){

    }else if($result[0]->school_id == $school_id){
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

session_start();
if(isset($_GET['action'])){
    if($_GET['action'] == 'check_school'){
        //echo "session ".$_SESSION['session_key'];
        //echo "session_key = {$_COOKIE['session_key']} openID = {$_COOKIE['openID']} ";
        //check_session($_SESSION['session_key'],$conn);
        //unset($_SESSION['openID']);
        if(isset($GLOBALS['openID'])){
            check_school($GLOBALS['openID'],$conn);
        }else{
            check_school('',$conn);
        }
        
    }

    if($_GET['action'] == 'set_school'){
        //echo "session ".$_SESSION['session_key'];
        //check_session($_SESSION['session_key'],$conn);
        //echo $GLOBALS['openID'];
        //exit;
        set_school($GLOBALS['openID'],$_POST['school_id'],$conn);
    }

    if($_GET['action'] == 'get_school'){
        //echo "session ".$_SESSION['session_key'];
        get_school($_GET['location_id'],$conn);

    }

    if($_GET['action'] == 'get_location'){
        //echo "session ".$_SESSION['session_key'];
        get_location($conn);
    }

}