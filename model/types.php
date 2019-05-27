<?php
require_once "mysql.php";

/*
**获取文章类型
*/
function article_type($conn){
    $query = "SELECT AT.type_id, AT.type_name FROM article_types AT, banner_words BW WHERE BW.second_TypeID = AT.type_id AND BW.sfirst_TypeID = 1";
    $query = "SELECT * FROM article_types";
    $result = mysqli_query($conn, $query);
    $result = getDataAsArray($result);
    return $result;
}

/*
**获取商品类型
*/
function item_type($conn){
    $query = "SELECT IT.type_id, IT.type_name FROM item_types IT, banner_words BW WHERE BW.second_TypeID = IT.type_id AND BW.sfirst_TypeID = 2";
    $query = "SELECT * FROM item_types";
    $result = mysqli_query($conn, $query);
    $result = getDataAsArray($result);
    return $result;
}