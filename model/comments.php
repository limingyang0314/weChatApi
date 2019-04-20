<?php
require_once 'mysql.php';

function select_comment_by_id($cid, $conn){
   $sql = "SELECT C.cid AS ID, C.cType, U.username, U.avatar, C.content, C.time 
   FROM comments C, users U 
   WHERE U.openID = C.openID 
   AND C.cID = {$cid}";
   $result = mysqli_query($conn, $sql);
   //echo $sql;
   $result = getDataAsArray($result);
   return $result;
}

function select_comment_by_pointerID($cType, $pointerID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT C.cid AS ID, C.cType, U.username, U.avatar, C.content, C.time 
    FROM comments C, users U 
    WHERE C.pointerID = {$pointerID} 
    AND U.openID = C.openID 
    AND C.cType = {$cType} 
    ORDER BY C.time 
    DESC LIMIT {$start},{$limit}";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    //exit;
    $result = getDataAsArray($result);
    return $result;
}

function select_comment_by_openID($openID,$limit,$page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT C.cid AS ID, C.cType, U.username, U.avatar, C.content, C.time, C.pointerID, C.pointerID2 
    FROM comments C, users U 
    WHERE C.openID = {$openID} 
    AND U.openID = C.openID 
    ORDER BY C.time 
    DESC LIMIT {$start},{$limit}";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    return $result;
}

function insert_comment($cType, $pointerID, $pointerID2, $openID, $content, $conn){
    $sql = "INSERT INTO comments (cType,pointerID,pointerID2,openID,content) VALUES ({$cType},{$pointerID},{$pointerID2},{$openID},'{$content}')";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    if($result){
        $table = 'articles';
        $ID_name = 'aID';
        if($cType == 2 || $cType == 4){
            $table = 'items';
            $ID_name = 'iID';
        }
        //$sql = "SELECT * FROM comments WHERE openID = '$openID' Limit 0,1 ORDER BY time DESC";
        //$result = mysqli_query($conn,$sql);
        $sql = "UPDATE $table SET comment_num = comment_num + 1 WHERE $ID_name = $pointerID";
        //echo $sql;
        mysqli_query($conn,$sql);
        $condition = "openID = $openID";
        $the_last_one = get_lastOne('comments',$condition);
        //var_dump($the_last_one);
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

/*
**向被回复者发送消息
*/
function send_message($openID, $aID, $cID){
    

}