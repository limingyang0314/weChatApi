<?php
require_once 'mysql.php';

function select_item_by_id($id, $conn){
    //echo $id;
    $sql = "SELECT I.iID AS ID, U.username, U.avatar, I.item_info AS content, T.type_name, I.hot, I.time ,I.comment_num, I.expect_price, I.contact_way, S.school_name, S.location_id
    FROM items I, item_types T, users U, schools S
    WHERE I.iID = $id 
    AND T.type_id = I.iType_ID 
    AND  S.sID = U.school_id
    AND U.openID = I.openID";
    
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    //var_dump($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_author($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT I.iID AS ID, U.username, U.avatar, I.item_info AS content, T.type_name, I.hot, I.time ,I.comment_num, S.school_name, S.location_id
    FROM items I, item_types T, users U  ,schools S
    WHERE I.openID = '$openID' 
    AND T.type_id = I.iType_ID 
    AND S.sID = U.school_id
    AND U.openID = I.openID 
    ORDER BY I.time DESC 
    LIMIT {$start},{$limit}";

    echo $sql;
    exit;

    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_type($type, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    // $type_condition = '';
    // $order = 'I.hot';
    // if($type != 1){
         $type_condition = "I.itype_ID = $type AND ";
    //     $order = 'I.time';
    // }
    $sql = "SELECT I.iID AS ID, U.username, U.avatar, I.item_info AS content, T.type_name, I.hot, I.time ,I.comment_num, I.expect_price, S.school_name, S.location_id
    FROM items I, item_types T, users U,schools S
    WHERE $type_condition 
    T.type_id = I.iType_ID 
    AND U.openID = I.openID 
    AND S.sID = U.school_id
    ORDER BY I.time DESC 
    LIMIT {$start},{$limit}";

    //echo $sql;
    //exit;

    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function insert_item($openID, $item_type, $item_info, $expect_price,$contact_way,$conn){
    $sql = "INSERT INTO items (iType_ID,openID,item_info,expect_price,contact_way) VALUES ($item_type, '$openID', '$item_info',$expect_price,'$contact_way')";
    //echo $sql;
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT iID FROM items WHERE openID = '{$openID}' ORDER BY time DESC LIMIT 0,1";

    //echo $sql;
    $result = getDataAsArray(mysqli_query($conn, $sql));
    //var_dump($result);

    $iID = $result[0]->iID;
    //$result = 
    //echo $sql;
    if(isset($_FILES["file1"])){
        //echo "start upload file1";
        insert_item_picture($_FILES["file1"],$iID,$conn,1);
    }
    if(isset($_FILES["file2"])){
        insert_item_picture($_FILES["file2"],$iID,$conn,2);
    }
    if(isset($_FILES["file3"])){
        insert_item_picture($_FILES["file3"],$iID,$conn,3);
    }

    $sql = "UPDATE users SET post_num = post_num + 1 WHERE openID = '$openID'";
    mysqli_query($conn, $sql);

    return array('iID' => $iID);
}

function insert_item_picture($file,$iID,$conn,$order){
    require_once "../model/pictures.php";
    upload_picture('item_pictures',$conn, $file, $iID,0,0,$order);
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
        //var_dump($thisOne);
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
        //var_dump($value);
        $value->pictures = get_item_picture($value->ID,$conn);
        $result[] = $value;
    }
    //exit;
    return $result;
}

/*
**删除商品
*/
function delete_item($openID, $iID){
    $sql = "DELETE FROM items WHERE iID = $iID AND openID = '$openID'";
    $result = mysqli_query($GLOBALS['conn'],$sql);
    if($result){
        $sql = "DELETE FROM item_pictures WHERE iID = $iID";
        $result = mysqli_query($GLOBALS['conn'],$sql);
    }

    if($result){
        $sql = "UPDATE users SET post_num = post_num - 1 WHERE openID = '$openID'";
        mysqli_query($conn, $sql);
        return "delete success!";
    }else{
        return "delete fail!";
    }
}