<?php
require_once "../middle/session.php";
function error_code($result, $err_code = -1, $message = null){
    $new = array(
        'error_code' => $err_code,
        'message' => $message,
        'result' => $result
    );
    return $new;
}

function decode_mirror($secretID){

    $array = str_split($secretID);
    $num = count($array);
    $result = '';
    for($i = 0 ; $i < $num - 5; $i ++){

        $temp = $array[$num - $i - 6];
        $tempResult = ord($temp) - 1;
        $tempResult = chr($tempResult);
        $result .= $tempResult;
    }
    return $result;
}

if(isset($_GET['secret_key'])){
    $_GET['openID'] = decode_mirror($_GET['secret_key']);
}

?>