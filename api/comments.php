<?php
require_once './api.php';

    require_once "../model/comments.php";
    switch ($_GET['secondType']){
    case 'select_comment_by_id':
        echo json_encode(error_code(select_comment_by_id($_GET['cid'], $conn)));
        break;
    case 'select_comment_by_pointerID':
        echo json_encode(error_code(select_comment_by_pointerID($_GET['cType'], $_GET['pointerID'], $conn)));
        break;
    case 'select_comment_by_openID':
        echo json_encode(error_code(select_comment_by_openID($_GET['openID'], $conn)));
        break;
    case 'insert_comment':
        echo json_encode(error_code(insert_comment($_GET['cType'], $_GET['pointerID'], $_GET['openID'], $_GET['content'], $conn)));
        break;
    case 'delete_comment':
        echo json_encode(error_code(delete_comment($_GET['openID'], $_GET['cID'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }