<?php
require_once 'mysql.php';

/**
 * 就近排序
 */
function select_item_by_location($type, $limit, $page,$latitude,$longitude, $conn){

    $temp = $latitude * $latitude + $longitude * $longitude;
    $ascKey = " ((I.latitude * I.latitude) + (I.longitude * I.longitude) - {$temp}) * ((I.latitude * I.latitude) + (I.longitude * I.longitude) - {$temp})";

    
    $start = (int)$limit * ((int)$page - 1);
    $type_condition = "I.itype_ID = $type AND ";
    $sql = "SELECT I.iID AS ID,
     U.username,
     U.openID,
     U.account_type,
      U.avatar,
       I.item_info AS content, 
       T.type_name, 
       I.hot, I.time ,
       I.comment_num, 
       I.expect_price, 
       S.school_name, 
       S.location_id,
       I.latitude,
       I.longitude,
       I.address
    FROM items I, item_types T, users U,schools S
    WHERE $type_condition 
    T.type_id = I.iType_ID 
    AND U.openID = I.openID 
    AND S.sID = U.school_id
    AND I.status = 0
    ORDER BY {$ascKey} ASC 
    LIMIT {$start},{$limit}";


    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

/**
 * 热度排序
 */
function select_item_by_hot($type, $limit, $page, $conn){
    $start = (int)$limit * ((int)$page - 1);
    $type_condition = "I.itype_ID = $type AND ";
    $sql = "SELECT I.iID AS ID,
     U.username,
     U.openID,
      U.avatar,
      U.account_type,
       I.item_info AS content, 
       T.type_name, 
       I.hot, I.time ,
       I.comment_num, 
       I.expect_price, 
       S.school_name, 
       S.location_id,
       I.latitude,
       I.longitude,
       I.address
    FROM items I, item_types T, users U,schools S
    WHERE $type_condition 
    T.type_id = I.iType_ID 
    AND U.openID = I.openID 
    AND S.sID = U.school_id
    AND I.status = 0
    ORDER BY I.hot DESC 
    LIMIT {$start},{$limit}";


    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_id($id, $conn,$openID = null){
    //echo $id;
    $sql = "SELECT I.iID AS ID, 
    U.username,
    U.openID, 
    U.avatar, 
    U.account_type,
    I.item_info AS content, 
    T.type_name, 
    I.hot, 
    I.time,
    I.comment_num, 
    I.expect_price, 
    I.contact_way, 
    S.school_name, 
    S.location_id, 
    I.latitude,
    I.longitude,
    I.address
    FROM items I, item_types T, users U, schools S
    WHERE I.iID = $id 
    AND T.type_id = I.iType_ID 
    AND  S.sID = U.school_id
    AND U.openID = I.openID";
    //echo $sql;
    //exit;
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    if(!empty($result)){
        //添加访问记录
        if($openID != null){
            $sql = "INSERT INTO item_records (iID,openID)VALUES($id,'$openID')";
            //echo $sql;
            mysqli_query($conn,$sql);
        }
    }
    //var_dump($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_author($openID, $limit, $page, $conn){
    $start = $limit * ($page - 1);
    $sql = "SELECT I.iID AS ID, 
    U.username,
    U.openID, 
    U.avatar, 
    U.account_type,
    I.item_info AS content, 
    T.type_name, 
    I.hot, 
    I.time ,
    I.comment_num, 
    S.school_name, 
    S.location_id, 
    I.status,
    I.latitude,
    I.longitude,
    I.address
    FROM items I, item_types T, users U  ,schools S 
    WHERE I.openID = '$openID' 
    AND T.type_id = I.iType_ID 
    AND S.sID = U.school_id
    AND U.openID = I.openID
    
    ORDER BY I.time DESC 
    LIMIT {$start},{$limit}";

    //echo $sql;
    //AND U.openID = I.openID
    //exit;

    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function select_item_by_type($type, $limit, $page, $conn){
    $start = (int)$limit * ((int)$page - 1);
    $type_condition = "I.itype_ID = $type AND ";
    $sql = "SELECT I.iID AS ID,
     U.username,
     U.openID,
      U.avatar,
      U.account_type,
       I.item_info AS content, 
       T.type_name, 
       I.hot, I.time ,
       I.comment_num, 
       I.expect_price, 
       S.school_name, 
       S.location_id,
       I.latitude,
       I.longitude,
       I.address
    FROM items I, item_types T, users U,schools S
    WHERE $type_condition 
    T.type_id = I.iType_ID 
    AND U.openID = I.openID 
    AND S.sID = U.school_id
    AND I.status = 0
    ORDER BY I.time DESC 
    LIMIT {$start},{$limit}";


    $result = mysqli_query($conn,$sql);
    $result = getDataAsArray($result);
    $result = add_pic_to_data($result, $conn);
    return $result;
}

function insert_item($openID, $item_type, $item_info, $expect_price,$contact_way,$latitude, $longitude,$address,$conn){
    $sql = "INSERT INTO items (iType_ID,openID,item_info,expect_price,contact_way) VALUES ($item_type, '$openID', '$item_info',$expect_price,'$contact_way')";


    $stmt = $GLOBALS['conn_obj']->prepare("INSERT INTO items (iType_ID,openID,item_info,expect_price,contact_way,latitude,longitude,address) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ississss',$item_type, $openID, $item_info,$expect_price,$contact_way,$latitude, $longitude,$address);
    $stmt->execute();
    $result = $stmt->store_result();

    if(!$result){
        return array('iID' => null);
    }

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
         $sql = "SELECT * FROM colletions WHERE type = 2 AND pointerID = $value->ID AND openID = '{$GLOBALS['openID']}'";
         $value->is_collection = false;
         if(!empty(getDataAsArray(mysqli_query($conn,$sql)))){
             $value->is_collection = true;
         }
        //$value->is_collection = false;
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
        mysqli_query($GLOBALS['conn'], $sql);
        return "delete success!";
    }else{
        return "delete fail!";
    }
}

/**
 * 修改商品状态
 */
function update_status($openID,$iID,$status){
    $sql = "UPDATE items SET status = $status WHERE openID = '$openID' AND iID = $iID";
    $result = mysqli_query($GLOBALS['conn'],$sql);
    if($result){
        return 'update success';
    }else{
        return 'update failed';
    }
}