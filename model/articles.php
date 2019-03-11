<?php
include 'mysql.php';

    /*
    **按文章的ID返回一篇文章
    */
    function select_article_by_id($aID, $conn){
        $sql = "SELECT A.title, T.type_name, A.content, U.username FROM articles A, users U, article_types T WHERE A.aID = {$aID} AND T.type_id = A.type_id AND U.openID = A.openID";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    /*
    **按作者的openID返回全部文章
    */
    function select_articles_by_author($openID, $conn){
        $sql = "SELECT A.title, T.type_name, A.content, U.username, A.time FROM articles A, users U, article_types T WHERE A.openID = {$openID} AND T.type_id = A.type_id AND U.openID = A.openID ORDER BY A.time DESC";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    /*
    **优先获取附近推送
    */
    function select_articles_near($location, $conn){

    }

$result = getDataAsArray(select_articles_by_author(1111, $conn));
//mysqli_fetch_object(
echo json_encode($result);


