<?php
include './api.php';

    include "../model/colletions.php";
    switch ($_GET['secondType']){
    case 'select_article_colletion':
        echo json_encode(error_code(get_article_colletion($_GET['openID'], $conn)));
        break;
    case 'select_item_colletion':
        echo json_encode(error_code(get_item_colletion($_GET['openID'], $conn)));
        break;
    case 'insert_colletion':
        echo json_encode(error_code(insert_colletion($_GET['openID'], $_GET['type'], $_GET['id'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    
    }