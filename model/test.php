<?php
$dbh = new PDO('mysql:localhost;dbname=wechatapi', 'root', 'dawangba1');
$sth = $dbh->prepare("SELECT A.title, A.aType, A.content, U.username FROM articles A, users U WHERE A.aID = ? AND U.openID = A.openID");
$sth->execute(array($aID));

var_dump($sth->fetchAll());