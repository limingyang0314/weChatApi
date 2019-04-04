<?php
require_once "session.php";
function is_Login(){
    if(isset($_SESSION['openID'])){
        //echo "openID is " . $_SESSION['openID'] . "<br>";
    }else{
        //echo "not login!<br>";
    }
}