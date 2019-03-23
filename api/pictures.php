<?php
require_once './api.php';

    require_once "../model/pictures.php";
    switch ($_GET['secondType']){
    case 'upload_banner':
        upload_picture('banners',$conn,$_FILES["file"]);
        break;
    case 'upload_item_picture':
        upload_picture('item_pictures',$conn);
        break;
    case 'upload_article_picture':
        upload_picture('article_pictures',$conn);
        break;
    case 'get_banner':
        //获取最近的5张banner
        echo json_encode(error_code(get_banners($_GET['number'],$conn)));
        break;
    case 'delete_banner':
        //获取最近的5张banner
        echo json_encode(error_code(delete_banners($_GET['id'],$conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
