<?php
include "api.php";

    include "../model/users.php";
    switch ($_GET['secondType']){
    case 'get_openID':
        //echo "ok";
        get_openID($_GET['code']);
        break;
    case 'get_user_info':
        //echo "ok";
        echo json_encode(error_code(get_user_info($_GET['openID'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
