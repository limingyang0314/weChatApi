<?php
require_once("model/mysql.php");
$sql = "INSERT INTO reports (type,from_openID,to_openID,pointerID,reason) 
VALUES ({$_POST['type']},'{$_POST['from_openID']}','{$_POST['to_openID']}',{$_POST['pointerID']},'{$_POST['reason']}')";
$result = mysqli_query($conn,$sql);
$state = array('error_code' => -1, 'message' => 'insert success');
if($result){
    echo json_encode($state);
}else{
    $state['error_code'] = 1;
    $state['error_message'] = 'isnert failed';
    echo json_encode($state);
}


