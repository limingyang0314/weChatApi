<?php

function getRandomStr($len, $special=false){
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    );

    if($special){
        $chars = array_merge($chars, array(
            "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
            "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
            "}", "<", ">", "~", "+", "=", ",", "."
        ));
    }

    $charsLen = count($chars) - 1;
    shuffle($chars);                            //打乱数组顺序
    $str = '';
    for($i=0; $i<$len; $i++){
        $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
    }
    return $str;
}

function encode($openID){
    $rear = getRandomStr(5);
    $array = str_split($openID);
    $num = count($array);
    $result = '';
    for($i = 0 ; $i < $num ; $i ++){
        $temp = $array[$num - $i - 1];
        $tempResult = ord($temp) + 1;
        $tempResult = chr($tempResult);
        $result .= $tempResult;
    }
    $result .= $rear;
    return $result;
}

echo encode('ozInc4iTuZJm9Fx6kSc_Z3pRGdCE');