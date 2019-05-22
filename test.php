<?php
require_once("model/mysql.php");
$sql = "DELETE FROM articles WHERE openID = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM items WHERE openID = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM comments WHERE openID = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM messages WHERE from_who = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM messages WHERE to_who = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM collections WHERE openID = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

$sql = "DELETE FROM users WHERE openID = 'ozInc4iTuZJm9Fx6kSc_Z3pRGdCE'";
mysqli_query($GLOBALS['conn'], $sql);

echo "DELETE FINISHED!";