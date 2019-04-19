<?php
require_once './api.php';
require_once "../model/search.php";
if(isset($_GET['secondType'])){
    if($_GET['secondType'] == 'history'){
        echo json_encode(error_code(get_search_history($_GET['openID'],$_GET['num'],$conn)));
    }

}else{
    echo json_encode(error_code(search($_GET['openID'],$_GET['type'],$_GET['keys'],$_GET['limit'],$_GET['page'], $conn)));
}