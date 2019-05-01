<?php
session_start();
if(isset($_SESSION['openID'])){
    echo $_SESSION['openID'];
}else{
    echo "hello,world!";
}