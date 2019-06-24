<?php
require_once './api.php';

    require_once "../model/articles.php";
    if(isset($_GET['secretID'])){
        
    }
    switch ($_GET['secondType']){
    case 'select_article_by_id':
        if(isset($_GET['openID'])){
            echo json_encode(error_code(select_article_by_id($_GET['ID'],$conn,$_GET['openID'])));
        }else{
            echo json_encode(error_code(select_article_by_id($_GET['ID'],$conn)));
        }
        //, $conn
        break;
    case 'select_article_by_author':
        echo json_encode(error_code(select_article_by_author($_GET['openID'], $_GET['limit'], $_GET['page'],$conn)));//, $conn
        break;
    case 'insert_article':
        if(isset($_POST['labels'])){
            $labels = $_POST['labels'];
        }else{
            $labels = "";
        }
        echo json_encode(error_code(insert_article($_GET['openID'], $_POST['article_type'], $_POST['content'],$_POST['latitude'],$_POST['longitude'],$_POST['address'],$labels,$conn)));//, $conn
        break;
    case 'select_article_by_type':
        if($_GET['mode'] == 3){
            echo json_encode(error_code(select_article_by_location($_GET['typeID'], $_GET['limit'], $_GET['page'], $_GET['mode'], $_GET['latitude'], $_GET['longitude'],$conn)));
        }else{
            echo json_encode(error_code(select_article_by_type($_GET['typeID'], $_GET['limit'], $_GET['page'], $_GET['mode'], $conn)));
        }
        
        break;
    case 'delete_article':
        echo json_encode(error_code(delete_article($_GET['openID'], $_GET['ID'], $conn)));
        break;
    case 'insert_article_picture':
        insert_article_picture($_FILES['file'],$_POST['aID'],$conn,$_POST['order']);
        break;
    case 'recommend_article':
        select_articles_near($location_id, $conn);
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }