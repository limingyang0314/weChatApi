<?php
$conn = mysqli_connect('localhost', 'root', 'dawangba1', 'wechatapi');
mysqli_query($conn,'set names utf8');

function getDataAsArray($temp){
    $result = [];
    while ($fieldinfo = mysqli_fetch_object($temp)) {
        $result[] = $fieldinfo;
    }
    return $result;
}