<?php
require_once './api.php';

    require_once "../model/articles.php";
    if(isset($_GET['secretID'])){
        
    }
    switch ($_GET['secondType']){
    case 'select_article_by_id':
        echo json_encode(error_code(select_article_by_id($_GET['ID'],$conn)));//, $conn
        break;
    case 'select_article_by_author':
        echo json_encode(error_code(select_article_by_author($_GET['openID'], $_GET['limit'], $_GET['page'],$conn)));//, $conn
        break;
    case 'insert_article':
        echo json_encode(error_code(insert_article($_GET['openID'], $_POST['article_type'], $_POST['content'],$conn)));//, $conn
        break;
    case 'select_article_by_type':
        echo json_encode(error_code(select_article_by_type($_GET['typeID'], $_GET['limit'], $_GET['page'], $_GET['mode'], $conn)));
        break;
    case 'delete_article':
        echo json_encode(error_code(delete_article($_GET['openID'], $_GET['ID'], $conn)));
        break;
    case 'upload_article_picture':
        insert_article_picture($_FILE['file'],$_POST['aID'],$conn,$_POST['order']);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }