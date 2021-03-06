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
        echo json_encode(error_code(delete_message($_GET['openID'], $_GET['mID'], $conn)));
        break;
    case 'add_comment_message':
        echo json_encode(error_code(add_comment_message($_POST['mType'], $_POST['from'], $_POST['to'], $_POST['pointerID1'], $_POST['pointerID2'], $_POST['pointerID3'])));
        break;
    case 'add_ordinary_message':
        echo json_encode(error_code(add_ordinary_message($_POST['from'], $_POST['to'], $_POST['comment'], $conn)));
        break;
    case 'get_message_by_type':
        echo json_encode(error_code(get_one_type_message($_GET['openID'], $_GET['typeID'], $_GET['limit'], $_GET['page'], $_GET['mode'])));
        break;
    // case 'select_user_message':
    //     echo json_encode(error_code(select_user_message($_GET['openID'], $_GET['limit'], $_GET['page'])));
    //     break;
    case 'delete_user_message':
        echo json_encode(error_code(delete_user_message($_GET['openID'], $_GET['umID'])));
        break;
    case 'set_UM_had_read':
        echo json_encode(error_code(set_UM_had_read($_GET['umID'])));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }