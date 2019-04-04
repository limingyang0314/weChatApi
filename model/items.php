<?php
require_once 'mysql.php';

function select_item_by_id($id, $conn){
    $sql = "SELECT * FROM items WHERE iID = $id";
    $result = mysqli_query($sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result);
    return $result;
}

function select_item_by_author($openID, $conn){
    $sql = "SELECT * FROM items WHERE openID = $openID";
    $result = mysqli_query($sql);
    $result = getDataAsArray($result);
    return $result;
}

function insert_item($openID, $item_type, $item_info, $conn){
    $sql = "INSERT INTO items (iType_ID,openID,item_info) VALUES ($item_type, $openID, $item_info)";
    $result = mysqli_query($sql);
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
        $value['pictures'] = get_item_picture($value,$conn);
        $result[] = $value;
    }
    return $result;
}