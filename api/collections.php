<?php
require_once './api.php';

    require_once "../model/collections.php";
    switch ($_GET['secondType']){
    case 'select_article_collection':
        echo json_encode(error_code(get_article_collection($_GET['openID'], $conn)));
        break;
    case 'select_item_collection':
        echo json_encode(error_code(get_item_collection($_GET['openID'], $conn)));
        break;
    case 'insert_collection':
        echo json_encode(error_code(insert_colletion($_GET['openID'], $_GET['type'], $_GET['id'], $conn)));
        break;
    case 'is_collection':
        echo json_encode(error_code(is_collection($_GET['openID'], $_GET['type'], $_GET['id'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    
    }