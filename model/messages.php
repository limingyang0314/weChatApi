<?php 
 require_once "mysql.php";

/*
**根据openID获取某个用户收到的所有消息
*/
function get_message_by_openID($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT M.from_who, M.mID, M.content,U.username, U.avatar, M.mType, M.aID, A.content AS article_content ,M.cID, c.content AS comment_content
    FROM messages M, users U, articles A, comments C
    WHERE M.to_who = '$openID' 
    AND A.aID = M.aID 
    AND C.cID = M.cID
    AND U.openID = M.from_who 
    ORDER BY M.time 
    DESC LIMIT {$start},{$limit}";

    //echo $sql;

    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    return $result;
}

/*
**根据openID获取某个用户收到的未读消息
*/
function get_message_by_openID_not_read($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT * 
    FROM messages M
    WHERE M.to_who = '$openID' 
    AND M.has_read <> 1 
    ORDER BY M.time 
    DESC LIMIT {$start},{$limit}";
    $temp =  mysqli_query($conn,$sql);
    $temp =  getDataAsArray($result);

    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    return $result;
}

/*
**获取一种类型的全部消息
*/
function get_one_type_message($openID, $typeID){
    if($typeID == 1){
        //对文章的回复类型
        $sql = "SELECT M.mID, M.mType, U.username, A.content
        FROM messages M, users U, articles A,Comments C
        WHERE M.to_who = $openID 
        AND A.aID = M.pointerID1
        AND U.openID = M.from_who
        AND C.cID = M.pointerID2";
        
    } else if($typeID == 2){
        //对文章回复的回复类型
        $sql = "SELECT M.mID, M.mType, U.username, A.content, C1.content, C2.content
        FROM messages M, users U, articles A, Comments C1, Comments C2
        WHERE M.to_who = $openID 
        AND A.openID = M.pointerID1
        AND C1.cID = M.pointerID2
        AND C2.cID = M.pointerID3 
        AND U.openID = M.from_who";

    } else if($typeID == 3){
        //对商品的回复类型
        $sql = "SELECT M.mID, M.mType, U.username, I.item_info,Comments C
        FROM messages M, users U, items I, users U
        WHERE M.to_who = $openID 
        AND U.openID = M.from_who 
        AND I.iID = M.pointerID1
        AND C.cID = M.pointerID2";

    } else if($typeID == 4){
        //对商品回复的回复类型
        $sql = "SELECT M.mID, M.mType, U.username, I.item_info
        FROM messages M, users U, items I, users U, Comments C1, Comments C2
        WHERE M.to_who = $openID 
        AND U.openID = M.from_who 
        AND I.iID = M.pointerID1
        AND C1.cID = M.pointerID2
        AND C2.cID = M.pointerID3";

    } else {
        echo "非法type";
        exit;
    }

    $result = mysqli($GLOBALS['conn'], $sql);
    $result = getDataAsArray($result);
    return $result;

}

/*
**分类查询消息
**list为二维数组
*/
function select_message_by_type($list){
    //文章回复的sql
    $sql1 = "SELECT M.from_who, M.mID, M.content,U.username, U.avatar, M.mType, M.aID, A.content AS article_content ,M.cID, c.content AS comment_content
    FROM messages M, users U, articles A, comments C
    WHERE M.to_who = '$openID' 
    AND A.aID = M.aID 
    AND C.cID = M.cID
    AND U.openID = M.from_who 
    ORDER BY M.time 
    DESC LIMIT {$start},{$limit}";

}

/*
**将某条消息标为已读
*/
function set_had_read($mID, $conn){
    $sql = "UPDATE messages SET has_read = 1 WHERE mID = $mID";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $sql = "SELECT has_read FROM messages WHERE mID = $mID";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    //var_dump($result);
    if($result[0]->has_read == 1){
        $result = "success";
    }else{
        $result = "fail";
    }
    return $result;
}

/*
**删除某条消息
*/
function delete_message($mID, $conn){
    $sql = "DELECT FROM messages WHERE mID = $mid";
    $result = mysqli_query($conn,$sql);
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
    $sql = "INSERT INTO user_messages (from_who, to_who, content) 
    VALUES ('$from', '$to', '$comment')";
    $result = mysqli_query($conn,$sql);
    return $result;
}
