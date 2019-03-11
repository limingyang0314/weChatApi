<?php
include "mysql.php";

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
    $query = "SELECT A.aID, A.title, C.time FROM colletions C, articles A WHERE C.openID = '{$openID}' AND C.type = 1 AND A.aID = C.cID";
    $result = $conn->query($query);
    return finish_colletion_select($result);
}

/*
**根据openID获取用户收藏商品
*/
function get_item_colletion($openID, $conn){
    $query = "SELECT * FROM colletions WHERE openID = '{$openID}' AND type = 2";
    $result = $conn->query($query);
    return finish_colletion_select($result);
}

