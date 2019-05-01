<?php
session_start();
if(iiset($_SESSION['openID'])){
    echo $_SESSION['openID'];
}else{
    echo "hello,world!";
}