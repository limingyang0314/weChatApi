<?php
require_once "mysql.php";

/*
**处理查询结果
*/
function finish_colletion_select($result){
    $result = getDataAsArray($result);
    return $result;
}

/*
**根据openID获取用户收藏文章
*/
function get_article_collection($openID,$conn){
    $query = "SELECT A.aID, A.openID, U.username, U.avatar, A.content, C.time 
    FROM colletions C, articles A, users U
    WHERE C.openID = '{$openID}' 
    AND C.type = 1 
    AND A.aID = C.pointerID
    AND U.openID = A.openID";
    //echo $query;

    $result = $conn->query($query);
    return finish_colletion_select($result);
}

/*
**根据openID获取用户收藏商品
*/
function get_item_collection($openID, $conn){
    $query = "SELECT I.iID, I.openID, U.username, U.avatar, I.item_info, I.time 
    FROM colletions C, items I , users U
    WHERE C.openID = '{$openID}' 
    AND C.type = 2 
    AND I.iID = C.pointerID
    AND U.openID = I.openID";

    //echo $query;
    //exit;
    $result = $conn->query($query);
    return finish_colletion_select($result);
}

/*
**为当前用户添加收藏
** type 1 文章  2 商品
*/
function insert_colletion($openID, $type, $id, $conn){
    $query = "INSERT INTO colletions (openID,type,pointerID) VALUES ('{$openID}',{$type}, {$id})";
    $result = $conn->query($query);
    if($result){
        $table = null;
        $id_name = null;
        if($type == 1){
            $table = "articles";
            $id_name = "aID";
        }

        if($type == 2){
            $table = "items";
            $id_name = "iID";
        }
        $query = "UPDATE {$table} SET hot = hot + 1 WHERE {$id_name} = {$id}";
        $conn->query($query);
        return array('result' => 'insert success!');
    }else{
        return array('result' => 'insert fail!');
    }

    // /*
    // **获取当前用户的收藏
    // ** type 1 文章  2 商品
    // */
    // function get_collection_by_user($openID, $type, $conn){

    // }


}

