<?php

function error_code($result, $err_code = -1, $message){
    $new = array(
        'error_code' => $err_code,
        'message' => $message,
        'result' => $result
    );
    return $new;
}


if(!isset($_GET['mainType'])){
    echo json_encode(error_code([],'未定义主要的操作类型',1));
    exit;
}

if($_GET['mainType'] == 'users'){
    include "./user.php";
    switch ($_GET['secondType']){
    case 'get_openID':
        //echo "ok";
        get_openID($_GET['code']);
        break;
    case 'select_article_by_author':
        select_article_by_author($_GET['openID'], $conn);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
}

if($_GET['mainType'] == 'articles'){
    include "./model/articles.php";
    switch ($_GET['secondType']){
    case 'select_article_by_id':
        select_article_by_id($_GET['aID'], $conn);
        break;
    case 'select_article_by_author':
        select_article_by_author($_GET['openID'], $conn);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
}

if($_GET['mainType'] == 'items'){
    include "./model/item.php";
    switch ($_GET['secondType']){
    case 'select_item_by_id':
        //select_article_by_id($_GET['aID'], $conn);
        break;
    case 'select_item_by_author':
        //select_article_by_author($_GET['openID'], $conn);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
}

if($_GET['mainType'] == 'pictures'){
    include "./model/pictures.php";
    switch ($_GET['secondType']){
    case 'upload_banner':
        upload_picture('banners');
        break;
    case 'upload_item_picture':
        upload_picture('item_pictures');
        break;
    case 'upload_article_picture':
        upload_picture('article_pictures');
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
}


?>