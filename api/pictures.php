<?php
require_once './api.php';

    require_once "../model/pictures.php";
    switch ($_GET['secondType']){
    case 'upload_banner':
        //echo "api OK !<br>";
        upload_picture('banners',$conn,$_FILES["file"],0,$_POST["first_typeID"],$_POST["second_typeID"]);
        break;
    case 'upload_banner_words':
        //echo "api OK !<br>";
        upload_picture('banner_words',$conn,$_FILES["file"],0,$_POST["first_typeID"],$_POST["second_typeID"]);
        break;
    case 'get_banner':
        //获取最近的5张banner
        echo json_encode(error_code(get_banners($_GET['number'],$conn)));
        break;
    case 'get_banner_by_type':
        //获取最近的5张banner
        echo json_encode(error_code(get_banners_by_type($_GET['first_type'],$_GET['second_type'],$conn)));
        break;
    case 'delete_banner':
        //获取最近的5张banner
        echo json_encode(error_code(delete_banners($_GET['id'],$conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }
