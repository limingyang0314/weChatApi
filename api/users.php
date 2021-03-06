<?php
require_once "api.php";

    require_once "../model/users.php";
    switch ($_GET['secondType']){
    case 'getAccessToken':
        getAccessToken();
        break;
    case 'getUserAccessToken':
        getUserAccessToken($_GET['code']);
        break;
    case 'get_openID':
        //echo "ok";
        get_openID($_GET['code']);
        break;
    case 'get_user_info':
        //echo "ok";
        echo json_encode(error_code(get_user_info($_GET['openID'], $conn)));
        break;
    case 'login':
        login($_GET['openID']);
        break;
    case 'recent_similar':
        echo json_encode(error_code(recent_similar($_GET['openID'],$conn,$_GET['latitude'],$_GET['longitude'])));
        break;
    case 'recent_labels':
        echo json_encode(error_code(recent_labels($_GET['openID'],$conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
