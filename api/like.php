<?php
require_once './api.php';

    require_once "../model/like.php";
    switch ($_GET['secondType']){
    case 'is_liked_article':
        echo json_encode(error_code(is_liked_article($_GET['openID'], $conn)));
        break;
    case 'is_liked_item':
        echo json_encode(error_code(is_liked_item($_GET['openID'], $conn)));
        break;
    case 'set_like':
        echo json_encode(error_code(set_like($_GET['openID'], $_GET['type'], $_GET['id'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    
    }