<?php
require_once './api.php';

    require_once "../model/articles.php";
    switch ($_GET['secondType']){
    case 'select_article_by_id':
        echo json_encode(error_code(select_article_by_id($_GET['aID'], $conn)));
        break;
    case 'select_article_by_author':
        echo json_encode(error_code(select_article_by_author($_GET['openID'], $conn)));
        break;
    case 'insert_article':
        echo json_encode(error_code(insert_article($_GET['openID'], $_POST['article_type'], $_POST['content'], $conn)));
        break;
    case 'select_article_by_type':
        echo json_encode(error_code(select_article_by_type($_GET['typeID'], $_GET['mode'], $conn)));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }