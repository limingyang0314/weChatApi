<?php
require_once "mysql.php";

/*
**获取文章类型
*/
function article_type($conn){
    $query = "SELECT * FROM article_types";
    $result = mysqli_query($conn, $query);
    $result = getDataAsArray($result);
    return $result;
}

/*
**获取商品类型
*/
function item_type($conn){
    $query = "SELECT * FROM item_types";
    $result = mysqli_query($conn, $query);
    $result = getDataAsArray($result);
    return $result;
}