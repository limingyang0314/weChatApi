<?php
require_once 'mysql.php';

function select_comment_by_id($cid, $conn){
   $sql = "SELECT C.cid, U.username, C.content, C.time FROM comments C, users U WHERE U.openID = C.openID AND C.cID = {$cid}";
   $result = mysqli_query($conn, $sql);
   $result = getDataAsArray($result);
   return $result;
}

function select_comment_by_pointerID($cType, $pointerID, $conn){
    $sql = "SELECT C.cid, U.username, C.content, C.time FROM comments C, users U WHERE C.pointerID = {$pointerID} AND U.openID = C.openID AND C.cType = {$cType}";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    //exit;
    $result = getDataAsArray($result);
    return $result;
}

function select_comment_by_openID($openID, $conn){
    $sql = "SELECT * FROM comments WHERE openID = {$openID}";
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    return $result;
}

function insert_comment($cType, $pointerID, $openID, $content, $conn){
    $sql = "INSERT INTO comments (cType,pointerID,openID,content) VALUES ({$cType},{$pointerID},{$openID},'{$content}')";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    if($result){
        return "insert success!";
    }else{
        return "insert fail!";
    }
}

function delete_comment($openID, $cid, $conn){
    $sql = "DELETE FROM comments WHERE openID = '$openID' AND cID = $cid";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    if($result){
        return "delete success!";
    }else{
        return "delete fail!";
    }

}