<?php

   function getToken($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //相当关键，这句话是让curl_exec($ch)返回的结果可以进行赋值给其他的变量进行，json的数据操作，如果没有这句话，则curl返回的数据不可以进行人为的去操作（如json_decode等格式操作）
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    return curl_exec($ch);
    }
    