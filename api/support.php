<?php
require_once "api.php";

    require_once "../model/support.php";
    switch ($_GET['secondType']){
    case 'contact_us':
        $result = contact_us($_POST['content'],$_POST['contact_way']);
        echo json_encode(error_code($result));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }