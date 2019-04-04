<?php
require_once "./api.php";

    require_once "../model/items.php";
    switch ($_GET['secondType']){
    case 'select_item_by_id':
        echo json_encode(error_code(select_item_by_id($_GET['iID'], $conn)));
        break;
    case 'select_item_by_author':
        echo json_encode(error_code(select_item_by_author($_GET['openID'], $conn)));
        break;
    case 'insert_item':
        echo json_encode(error_code(insert_item($_GET['openID'],$_POST['item_type'],$_POST['item_info'], $conn)));//$openID, $item_type, $item_info
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }

?>