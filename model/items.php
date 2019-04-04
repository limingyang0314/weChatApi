<?php
require_once 'mysql.php';

function select_item_by_id($id, $conn){
    //echo $id;
    $sql = "SELECT I.iID, U.username, I.item_info, T.type_name, I.hot, I.time FROM items I, item_types T, users U  WHERE I.iID = $id AND T.type_id = I.iType_ID AND U.openID = I.openID";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    //var_dump($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_author($openID, $conn){
    $sql = "SELECT I.iID, U.username, I.item_info, T.type_name, I.hot, I.time FROM items I, item_types T, users U  WHERE I.openID = $openID AND T.type_id = I.iType_ID AND U.openID = I.openID";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function insert_item($openID, $item_type, $item_info, $conn){
    $sql = "INSERT INTO items (iType_ID,openID,item_info) VALUES ($item_type, $openID, $item_info)";
    $result = mysqli_query($conn,$sql);
}

function insert_picture($file){

}

/*
**获取文章的图片们
*/
function get_item_picture($iID,$conn){
    $sql = "SELECT pURL FROM item_pictures WHERE iID = {$iID}";
    //echo $sql."<br>";
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $newResult = [];
    foreach($result as $thisOne){
        $newResult[] = $thisOne;
    }
    return $newResult;
}

/*
**将图片插入文章数据的数组
*/
function add_pic_to_data($data,$conn){

    $result = [];
    foreach($data as $value){

        $value->pictures = get_item_picture($value->iID,$conn);
        $result[] = $value;
    }
    //exit;
    return $result;
}