<?php 
 require_once "mysql.php";

/*
**根据openID获取某个用户收到的所有消息
*/
function get_message_by_openID($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT M.from_who, M.mID, M.content 
    FROM messages M, users U 
    WHERE M.to_who = '$openID' 
    AND U.openID = M.from_who 
    ORDER BY time 
    DESC LIMIT {$start},{$limit}";

    $result = mysqli_query($conn,$mID);
    $result = getDataAsArray($result);
    return json_encode($result);
}

/*
**根据openID获取某个用户收到的未读消息
*/
function get_message_by_openID_not_read($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT M.from_who, M.mID, M.content 
    FROM messages M, users U 
    WHERE M.to_who = '$openID' 
    AND U.openID = M.from_who 
    AND M.has_read <> 1 
    ORDER BY time 
    DESC LIMIT {$start},{$limit}";

    $result = mysqli_query($conn,$mID);
    $result = json_encode(getDataAsArray($result));
    return $result;
}

/*
**将某条消息标为已读
*/
function set_had_read($mID, $conn){
    $sql = "UPDATE messages SET has_read = 1 WHERE mID = $mid";
    $result = mysqli_query($conn,$mID);
    return $result;
}

/*
**删除某条消息
*/
function delete_message($mID, $conn){
    $sql = "DELECT FROM messages WHERE mID = $mid";
    $result = mysqli_query($conn,$mID);
    return $result;
}

/*
**增加一条回复类型的消息
*/
function add_comment_message($from, $to, $aID, $cID, $conn){
    $sql = "INSERT INTO messages (from_who, to_who, content, mType, aID, cID) 
    VALUES ('$from', '$to', '$comment', 2, '$aID', '$cID')";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/*
**增加一条普通的站内私信
*/
function add_ordinary_message($from, $to, $comment, $conn){
    $sql = "INSERT INTO messages (from_who, to_who, content, mType) 
    VALUES ('$from', '$to', '$comment',1)";
    $result = mysqli_query($conn,$sql);
    return $result;
}
