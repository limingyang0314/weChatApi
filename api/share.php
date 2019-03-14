<?php
include "api.php";

    include "../model/share.php";
    switch ($_GET['secondType']){
    case 'hotter':
        $result = hotter($_GET['type'], $_GET['id'], $conn);
        echo json_encode(error_code($result));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }