<?php
require_once 'mysql.php';
    /*
    **获取文章们的图片
    */
    function get_article_picture($aID,$conn){
        $sql = "SELECT pURL FROM article_pictures WHERE aID = {$aID}";
        //echo $sql."<br>";
        $result = mysqli_query($conn,$sql);
        $result = getDataAsArray($result);
        $newResult = [];
        foreach($result as $thisOne){
            $newResult[] = $thisOne;
        }
        return $newResult;
    }

    /*
    **处理某篇文章
    */
    function finish_article_select_exactly($aID,$result,$conn){
        //$temp = getDataAsArray($result);
        //$result = $temp;//[0];//[0]
        //var_dump($temp);
        //var_dump($result);
        //exit;
        $result[0]->pictures = get_article_picture($aID,$conn);
        return $result;
    }

    /*
    **处理文章列表(不返回图片)
    */
    function finish_article_select_list($result){
        $result = getDataAsArray($result);
        return $result;
    }

    /**
     * 就近推送
     */
    function select_article_by_location($typeID, $limit, $page, $mode = 3, $latitude, $longitude, $conn){
        $start = (int)$limit * ((int)$page - 1);
        $temp = $latitude * $latitude + $longitude * $longitude;
        $ascKey = " ((A.latitude * A.latitude) + (A.longitude * A.longitude) - {$temp}) * ((A.latitude * A.latitude) + (A.longitude * A.longitude) - {$temp})";
        $tableCase = '';
        if($mode == 3){
            
        }
        $type_condition = '';
        if($typeID == 1){
            $descKey = 'A.hot';
        }else if($typeID == 2 || $typeID == 4){
            //选择本校信息
            
            if(isset($GLOBALS['openID'])){
                $tableCase = ", users U2";
                $type_condition = "A.type_id = $typeID 
                AND U2.openID = '{$GLOBALS['openID']}' 
                AND U.school_id = U2.school_id 
                AND";
            }
        }else{
            $type_condition = "A.type_id = '$typeID' AND";
        }
        $sql = "SELECT A.aid AS ID, U.school_id,T.type_id, A.content, A.comment_num,
         T.type_name, A.hot, U.username, U.avatar, A.time, U.openID ,
          A.comment_num, S.school_name, S.location_id,
           A.latitude,A.longitude,A.address,A.labels,
           ((A.latitude * A.latitude) + (A.longitude * A.longitude)) - {$temp}
        FROM articles A, users U, article_types T ,schools S $tableCase
        WHERE $type_condition T.type_id = A.type_id 
        AND U.openID = A.openID 
        AND S.sID = U.school_id
        ORDER BY {$ascKey} ASC
        LIMIT {$start},{$limit}";
        //  * ((A.latitude * A.latitude) + (A.longitude * A.longitude) - {$temp})
        //- {$temp}
        echo $temp;
        //echo $sql;
        //exit;

        $result = mysqli_query($conn,$sql);

        $result = finish_article_select_list($result);

        $newResult = [];
        foreach($result as $value){
            //var_dump($value);
            //echo $value->aID."<br>";
             $query = "SELECT * FROM colletions WHERE type = 1 AND openID = '{$GLOBALS['openID']}' AND pointerID = $value->ID";
             //echo $query;
            // //echo "<br>";
            // //exit;
             $result = mysqli_query($conn,$query);
             $result = getDataAsArray($result);
             if(!empty($result)){
                 $value->is_collection = true;
             }else{
                 $value->is_collection = false;
             }
            //$value->is_collection = false;
            $value->pictures = get_article_picture($value->ID,$conn);
            $newResult[] = $value;
        }
        return $newResult;
    }

    /*
    **按文章的ID具体返回一篇文章
    */
    function select_article_by_id($aID, $conn, $openID = null){

        //echo $_SESSION['openID'];
        $sql = "SELECT A.aid AS ID, A.content, A.comment_num,
         T.type_name, A.hot, U.username, U.avatar, A.time, U.openID ,
          A.comment_num, S.school_name, S.location_id, A.latitude,
          A.longitude,A.address,A.labels
        FROM articles A, users U, article_types T,schools S
        WHERE A.aID = {$aID} 
        AND T.type_id = A.type_id 
        AND U.openID = A.openID
        AND S.sID = U.school_id";
        //ORDER BY time DESC LIMIT {$start},{$limit}";

        $result = mysqli_query($conn,$sql);
        $result = getDataAsArray($result);
        //var_dump($result);
        //exit;
        if(!empty($result)){
            //添加访问记录
            if($openID != null){
                $sql = "INSERT INTO article_records (aID,openID)VALUES($aID,'$openID')";
                mysqli_query($conn,$query);
            }
        }

        $query = "SELECT * FROM colletions WHERE type = 1 AND openID = '{$GLOBALS['openID']}' AND pointerID = {$result[0]->ID}";
        //echo $query;
       // //echo "<br>";
        //exit;
        $result2 = mysqli_query($conn,$query);
        $result2 = getDataAsArray($result2);
        if(!empty($result2)){
            $result[0]->is_collection = true;
        }else{
            $result[0]->is_collection = false;
        }

        return finish_article_select_exactly($aID,$result,$conn);
    }

    /*
    **按作者的openID返回全部文章的简要信息
    */
    function select_article_by_author($openID, $limit, $page, $conn){
        $start = $limit * ($page - 1);
        $sql = "SELECT A.aid AS ID, A.content, A.comment_num,
         T.type_name, A.hot, U.username, U.avatar, A.time, U.openID,
          A.comment_num, S.school_name, S.location_id, A.latitude,
          A.longitude,A.address,A.labels
        FROM articles A, users U, article_types T ,schools S
        WHERE A.openID = '$openID' 
        AND T.type_id = A.type_id 
        AND U.openID = A.openID 
        AND S.sID = U.school_id
        ORDER BY A.time DESC 
        LIMIT {$start},{$limit}";
        //echo $sql;
        //exit;

        $result = mysqli_query($conn,$sql);
        return finish_article_select_list($result);
    }

    /*
    **按类型ID返回n篇文章
    **mode = 1时为按热度排序 mode = 2时为按时间排序
    **默认按时间排序
    */
    function select_article_by_type($typeID, $limit, $page, $mode = 1, $conn){

        $start = (int)$limit * ((int)$page - 1);
        $descKey = null;
        $tableCase = '';
        if($mode == 1){
            $descKey = 'A.hot';
        }
        if($mode == 2){
            $descKey = 'A.time';
        }
        $type_condition = '';
        if($typeID == 1){
            $descKey = 'A.hot';
        }else if($typeID == 2 || $typeID == 4){
            //选择本校信息
            
            if(isset($GLOBALS['openID'])){
                $tableCase = ", users U2";
                $type_condition = "A.type_id = $typeID 
                AND U2.openID = '{$GLOBALS['openID']}' 
                AND U.school_id = U2.school_id 
                AND";
            }

            #SELECT school_id FROM users WHERE openID = 'ozInc4nwKnuiqorp2la-JiLlk-jE';
            
            //$type_condition = "A.type_id = '$typeID' AND U.school_id = ''";
        }else{
            $type_condition = "A.type_id = '$typeID' AND";
        }
        $sql = "SELECT A.aid AS ID, U.school_id,T.type_id, A.content, A.comment_num,
         T.type_name, A.hot, U.username, U.avatar, A.time, U.openID ,
          A.comment_num, S.school_name, S.location_id,
           A.latitude,A.longitude,A.address,A.labels
        FROM articles A, users U, article_types T ,schools S $tableCase
        WHERE $type_condition T.type_id = A.type_id 
        AND U.openID = A.openID 
        AND S.sID = U.school_id
        ORDER BY {$descKey} DESC 
        LIMIT {$start},{$limit}";

        //echo $GLOBALS['openID'];
        //echo $typeID;
        //echo $sql;
        //exit;
        $result = mysqli_query($conn,$sql);

        $result = finish_article_select_list($result);

        $newResult = [];
        foreach($result as $value){
            //var_dump($value);
            //echo $value->aID."<br>";
             $query = "SELECT * FROM colletions WHERE type = 1 AND openID = '{$GLOBALS['openID']}' AND pointerID = $value->ID";
             //echo $query;
            // //echo "<br>";
            // //exit;
             $result = mysqli_query($conn,$query);
             $result = getDataAsArray($result);
             if(!empty($result)){
                 $value->is_collection = true;
             }else{
                 $value->is_collection = false;
             }
            //$value->is_collection = false;
            $value->pictures = get_article_picture($value->ID,$conn);
            $newResult[] = $value;
        }
        return $newResult;
    }

    /*
    **优先获取附近推送，返回多条简要信息
    */
    function select_articles_near($location_id, $conn){
        $sql = "SELECT A.aid, A.content, T.type_name, U.username, U.avatar, A.time, U.openID , A.comment_num
        FROM articles A, users U, article_types T 
        WHERE  T.type_id = A.type_id 
        AND U.openID = A.openID 
        AND location_id = $location_id
        ORDER BY A.time DESC";
        
        $result = mysqli_query($conn,$sql);
        return finish_article_select_list($result);
    }

    /*
    **增加一条article
    */
    function insert_article($openID, $article_type, $content,$latitude,$longitude,$address,$labels, $conn){
        //$sql = "INSERT INTO articles (openID,type_id,content,location_id,latitude,longitude,address) VALUES ('{$openID}','{$article_type}','{$content}',1,'$latitude','$longitude','$address')";
        //echo $sql;
        //exit;
        //$result = mysqli_query($conn, $sql);
        $stmt = $GLOBALS['conn_obj']->prepare("INSERT INTO articles (openID,type_id,content,location_id,latitude,longitude,address,labels) VALUES (?,?,?,1,?,?,?,?)");
        $stmt->bind_param('sisssss',$openID,$article_type,$content,$latitude,$longitude,$address,$labels);
        $stmt->execute();
        $result = $stmt->store_result();
        //$GLOBALS['conn_obj']->
        if(!$result){
            return array('aID' => null);
        }

        $sql = "SELECT aID FROM articles WHERE openID = '{$openID}' ORDER BY time DESC LIMIT 0,1";


        $result = getDataAsArray(mysqli_query($conn, $sql));
        //var_dump($result);

        $aID = $result[0]->aID;
        //$result = 
        //echo $sql;
        if(isset($_FILES["file1"])){
            //echo "start upload file1";
            insert_article_picture($_FILES["file1"],$aID,$conn,1);
        }
        if(isset($_FILES["file2"])){
            insert_article_picture($_FILES["file2"],$aID,$conn,2);
        }
        if(isset($_FILES["file3"])){
            insert_article_picture($_FILES["file3"],$aID,$conn,3);
        }

        return array('aID' => $aID);
    }

    /*
    **增加一条文章图片
    */
    function insert_article_picture($file,$pointerID,$conn,$order){
        require_once "../model/pictures.php";
        upload_picture('article_pictures',$conn, $file, $pointerID,0,0,$order);
    }


    /*
    **删除某篇文章
    */
    function delete_article($openID, $aid, $conn){
        $sql = "DELETE FROM articles WHERE openID = '$openID' AND aID = $aid";
        $result = mysqli_query($conn, $sql);
        //echo $sql;
        if($result){
            return "delete success!";
        }else{
            return "delete fail!";
        }
    
    }

    function recommend(){
        

    }