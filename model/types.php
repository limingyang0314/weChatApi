<?php
include "mysql.php";

/*
**获取文章类型
*/
function article_type($conn){
    $query = "SELECT * FROM article_types";
    $result = mysqli_query($conn, $query);
    $result = getDataAsArray($result);
    return $result;
}