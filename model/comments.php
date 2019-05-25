<?php
require_once 'mysql.php';

function select_comment_by_id($cid, $conn){
   $sql = "SELECT C.cid AS ID, C.cType, U.username,U.openID, U.avatar, C.content, C.time , S.school_name, s.location_id
   FROM comments C, users U 
   WHERE U.openID = C.openID 
   AND S.sID = U.school_id
   AND C.cID = {$cid}";
   $result = mysqli_query($conn, $sql);
   //echo $sql;
   $result = getDataAsArray($result);
   return $result;
}

function select_comment_by_pointerID($cType, $pointerID, $limit, $page, $conn){
    $subtype = 3;
    if($cType == 2){
        $subtype = 4;
    }
    $start = $limit * ($page - 1);
    $sql = "SELECT C.cid AS ID, C.cType, U.username,U.openID,C.pointerID2, U.avatar, C.content, C.time, S.school_name, s.location_id
    FROM comments C, users U ,schools S
    WHERE C.pointerID = {$pointerID} 
    AND U.openID = C.openID 
    AND S.sID = U.school_id
    AND (C.cType = {$cType} OR C.cType = {$subtype}) 
    ORDER BY C.time 
    ASC LIMIT {$start},{$limit}";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    //exit;
    $result = getDataAsArray($result);
    return $result;
}

function select_comment_by_openID($openID,$limit,$page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT C.cid AS ID, C.cType, U.username,U.openID, U.avatar, C.content, C.time, C.pointerID, C.pointerID2 , S.school_name, s.location_id
    FROM comments C, users U 
    WHERE C.openID = {$openID} 
    AND S.sID = U.school_id
    AND U.openID = C.openID 
    ORDER BY C.time 
    DESC LIMIT {$start},{$limit}";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    return $result;
}

function insert_comment($cType, $pointerID1, $pointerID2, $openID, $content, $conn){
    $sql = "INSERT INTO comments (cType,pointerID,pointerID2,openID,content) VALUES ({$cType},{$pointerID1},{$pointerID2},'{$openID}','{$content}')";

    $stmt = $GLOBALS['conn_obj']->prepare("INSERT INTO comments (cType,pointerID,pointerID2,openID,content) VALUES (?,?,?,?,?)");
    $stmt->bind_param('iiiss',$cType,$pointerID1,$pointerID2,$openID,$content);
    $stmt->execute();
    $result = $stmt->store_result();

    //$result = mysqli_query($conn, $sql);
    //echo $sql;
    //exit;
    if($result){
        $table = 'articles';
        $ID_name = 'aID';
        if($cType == 2 || $cType == 4){
            $table = 'items';
            $ID_name = 'iID';
        }

        $sql = "UPDATE $table SET comment_num = comment_num + 1 WHERE $ID_name = $pointerID1";
        //echo $sql;
        mysqli_query($conn,$sql);
        
        
        $sql = "UPDATE users SET reply_num = reply_num + 1 WHERE openID = '$openID'";
        mysqli_query($conn, $sql);

        //获取这条发布的评论的cID
        $condition = "openID = '$openID'";
        $the_last_one = get_lastOne('comments',$condition);
        //var_dump($the_last_one);

        $thisCID =  $the_last_one->cID;
        //获取完毕

        //获取原作者
        if($cType == 3 || $cType == 4){
            //回复类型
            $condition = "cID = $pointerID2";
            $the_last_one = get_lastOne('comments',$condition);
        }else if($cType == 1){
            $condition = "aID = $pointerID1";
            $the_last_one = get_lastOne('articles',$condition);
        }else if($cType == 2){
            $condition = "iID = $pointerID1";
            $the_last_one = get_lastOne('items',$condition);
        }else{
            $condition = "aID = $pointerID1";
            $the_last_one = get_lastOne('articles',$condition);
        }
        //var_dump($the_last_one);
        //exit;
        $toOpenID = $the_last_one->openID;
         //echo "to : " . $toOpenID . "<br>";
        //获取完成
        $fromOpenID = $openID;
         //echo "from : " . $fromOpenID . "<br>";
        //exit;
        $from = $fromOpenID; 
        $to = $toOpenID; 
        
        if($cType == 3 || $cType == 4){
            $pointerID3 = $thisCID; 
            $sql = "INSERT INTO messages (mType, from_who, to_who, pointerID1, pointerID2, pointerID3) 
            VALUES ($cType, '$from', '$to', '$pointerID1', '$pointerID2', '$pointerID3')";
        }else{
            $pointerID2 = $thisCID; 
            $sql = "INSERT INTO messages (mType, from_who, to_who, pointerID1, pointerID2) 
            VALUES ($cType, '$from', '$to', '$pointerID1', '$pointerID2')";
        }

        //echo $sql;
        //exit;
        mysqli_query($conn, $sql);

        
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
        $sql = "UPDATE users SET reply_num = reply_num - 1 WHERE openID = '$openID'";
        mysqli_query($conn, $sql);
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