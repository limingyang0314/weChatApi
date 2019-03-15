<?php
require_once 'mysql.php';
    /*
    **获取文章们的图片
    */
    function get_article_picture($result){
        $newResult = [];
        foreach($result as $thisOne){
            $thisOne->pictures = array(array('url' => "https://127.0.0.1/upload/20190311001.jpg"), 
            array('url' => "https://127.0.0.1/upload/20190311002.jpg"));
            $newResult[] = $thisOne;
        }
        return $newResult;
    }

    /*
    **处理某篇文章
    */
    function finish_article_select_exactly($result){
        $result = getDataAsArray($result);
        $result = get_article_picture($result);
        return $result;
    }

    /*
    **处理文章列表(不返回图片)
    */
    function finish_article_select_list($result){
        $result = getDataAsArray($result);
        return $result;
    }


    /*
    **按文章的ID具体返回一篇文章
    */
    function select_article_by_id($aID, $conn){
        $sql = "SELECT T.type_name, A.content, A.hot, U.username, U.openID FROM articles A, users U, article_types T WHERE A.aID = {$aID} AND T.type_id = A.type_id AND U.openID = A.openID";
        $result = mysqli_query($conn,$sql);
        return finish_article_select_exactly($result);
    }

    /*
    **按作者的openID返回全部文章的简要信息
    */
    function select_article_by_author($openID, $conn){
        $sql = "SELECT A.aid, A.content, T.type_name, A.hot, U.username, A.time, U.openID FROM articles A, users U, article_types T WHERE A.openID = '$openID' AND T.type_id = A.type_id AND U.openID = A.openID ORDER BY A.time DESC";
        $result = mysqli_query($conn,$sql);
        return finish_article_select_list($result);
    }

    /*
    **优先获取附近推送，返回多条简要信息
    */
    function select_articles_near($location_id, $conn){
        $sql = "SELECT A.aid, A.content, T.type_name, U.username, A.time, U.openID FROM articles A, users U, article_types T WHERE A.openID = '$openID' AND T.type_id = A.type_id AND U.openID = A.openID ORDER BY A.time DESC";
        $result = mysqli_query($conn,$sql);
        return finish_article_select_list($result);
    }

    /*
    **增加一条article
    */
    function insert_article($openID, $article_type, $content,$pictures, $conn){
        $sql = "INSERT INTO articles (openID,) VALUES ()";




    }

    /*
    **增加一条文章图片
    */
    function insert_article_picture($file){

    }



