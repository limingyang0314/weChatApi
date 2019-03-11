<?php

function error_code($result, $err_code = -1, $message = null){
    $new = array(
        'error_code' => $err_code,
        'message' => $message,
        'result' => $result
    );
    return $new;
}


// if(!isset($_GET['mainType'])){
//     echo json_encode(error_code([],'未定义主要的操作类型',1));
//     exit;
// }


?>