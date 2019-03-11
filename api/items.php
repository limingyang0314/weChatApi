<?php
include "./api.php";

    include "../model/item.php";
    switch ($_GET['secondType']){
    case 'select_item_by_id':
        //echo error_code(select_article_by_id($_GET['aID'], $conn));
        break;
    case 'select_item_by_author':
        //echo error_code(select_article_by_author($_GET['openID'], $conn));
        break;
    default:
        echo json_encode(error_code([],'未定义次要的操作类型',2));
    }

?>