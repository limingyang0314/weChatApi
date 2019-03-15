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
function get_article_colletion($openID,$conn){
    $query = "SELECT A.aID, A.title, C.time FROM colletions C, articles A WHERE C.openID = '{$openID}' AND C.type = 1 AND A.aID = C.pointerID";
    $result = $conn->query($query);
    return finish_colletion_select($result);
}

/*
**根据openID获取用户收藏商品
*/
function get_item_colletion($openID, $conn){
    $query = "SELECT I.iID, I.item_name, I.item_info FROM colletions C, item I WHERE C.openID = '{$openID}' AND C.type = 2 AND I.iID = C.pointerID";
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


}

