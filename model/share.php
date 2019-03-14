<?php
include "mysql.php";

/*
**用户分享使帖子或商品热度加一
*/
function hotter($type, $id, $conn){
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
    $result = $conn->query($query);
    if($result){
        return array('result' => 'update success!');
    }else{
        return array('result' => 'update fail!');
    }

}