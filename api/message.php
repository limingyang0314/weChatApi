<?php
require_once "./api.php";

    require_once "../model/messages.php";
    switch ($_GET['secondType']){
    case 'get_message_by_openID':
        //echo error_code(select_article_by_id($_GET['aID'], $conn));
        break;
    case 'set_had_read':
        //echo error_code(select_article_by_author($_GET['openID'], $conn));
        break;
    case 'delete_message':
        // echo error_code
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }