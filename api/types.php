<?php
require_once "api.php";

    require_once "../model/types.php";
    switch ($_GET['secondType']){
    case 'get_item_types':
        $result = article_type($conn);
        echo json_encode(error_code($result));
        break;
    case 'get_item_types':
        $result = item_type($conn);
        echo json_encode(error_code($result));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }