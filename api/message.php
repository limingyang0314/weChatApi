<?php
require_once "./api.php";

    require_once "../model/messages.php";
    switch ($_GET['secondType']){
    case 'get_message_by_openID':
        echo json_encode(error_code(get_message_by_openID($_GET['openID'], $_GET['limit'], $_GET['page'], $conn)));
        break;
    case 'get_message_by_openID_not_read':
        echo json_encode(error_code(get_message_by_openID_not_read($_GET['openID'], $_GET['limit'], $_GET['page'], $conn)));
        break;
    case 'set_had_read':
        echo json_encode(error_code(set_had_read($_GET['mID'], $conn)));
        break;
    case 'delete_message':
        delete_message($_POST['mID'], $conn);
        break;
    case 'add_comment_message':
        add_comment_message($_POST['from'], $_POST['to'], $_POST['aID'], $_POST['cID'], $conn);
        break;
    case 'add_ordinary_message':
        add_ordinary_message($_POST['from'], $_POST['to'], $_POST['comment'], $conn);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }