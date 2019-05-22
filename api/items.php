<?php
require_once "./api.php";

    require_once "../model/items.php";
    switch ($_GET['secondType']){
    case 'select_item_by_id':
        echo json_encode(error_code(select_item_by_id($_GET['ID'], $conn)));
        break;
    case 'select_item_by_author':
        echo json_encode(error_code(select_item_by_author($_GET['openID'], $_GET['limit'], $_GET['page'], $conn)));
        break;
    case 'select_item_by_type':
        echo json_encode(error_code(select_item_by_type($_GET['type'], $_GET['limit'], $_GET['page'], $conn)));
        break;
    case 'insert_item':
        if(!isset($_POST['expect_price'])){
            $_POST['expect_price'] = 0;
        }
        if(!isset($_POST['contact_way'])){
            $_POST['contact_way'] = 'null';
        }
        echo json_encode(error_code(insert_item($_GET['openID'],$_POST['item_type'],$_POST['item_info'],$_POST['expect_price'],$_POST['contact_way'], $conn)));//$openID, $item_type, $item_info
        break;
    case 'delete_item':
        echo json_encode(error_code(delete_item($_GET['openID'],$_GET['ID'])));
        break;
    case 'insert_item_picture':
        insert_item_picture($_FILES['file'],$_POST['iID'],$conn,$_POST['order']);
        break;
    case 'update_status':
        echo json_encode(error_code(update_status($_GET['openID'], $_GET['ID'], $_GET['status'])));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }

?>