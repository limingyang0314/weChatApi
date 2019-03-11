<?php
include './api.php';
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