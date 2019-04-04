<?php
require_once "./api.php";

    require_once "../model/items.php";
    switch ($_GET['secondType']){
    case 'select_item_by_id':
        echo error_code(select_article_by_id($_GET['aID'], $conn));
        break;
    case 'select_item_by_author':
        echo error_code(select_article_by_author($_GET['openID'], $conn));
        break;
    case 'insert_item':
        echo error_code(insert_article($_GET['openID'],$_POST['item_type'],$_POST['item_info'], $conn));//$openID, $item_type, $item_info
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }

?>