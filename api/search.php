<?php
require_once './api.php';
require_once "../model/search.php";
echo json_encode(error_code(search($_GET['type'],$_GET['keys'],$_GET['limit'],$_GET['page'], $conn)));