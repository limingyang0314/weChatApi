<?php
require_once "mysql.php";
$appID = "wxc24a817201be0ebc";

function getAccessToken(){
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575";

    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    echo $result;
}

function getUserAccessToken($code){
    $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&code=$code&grant_type=authorization_code";
    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $_SESSION['openID'] = "omfHM4iU0EA1jCLmUh43itEhtpcc";//json_decode($result)->openid;
    echo $result;
}

function get_openID($js_code){
    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxc24a817201be0ebc&secret=17b371bd3f834c1c782afeafb7bc3575&js_code={$js_code}&grant_type=authorization_code";
    require_once("../curl.php");
    $result = getToken($url);
    session_start();
    $temp = json_decode($result);
    //var_dump($temp);
    $_SESSION['openID'] = $temp->openid;//json_decode($result)->openid;
    $_COOKIE['session_key'] = $temp->session_key;
    //echo $_SESSION['openID'];
    //echo "   ".$_COOKIE['session_key']."  ";
    echo $result;
    //echo $_SESSION['openID'];
}

function get_user_info($openID, $conn){
     $sql = "SELECT U.openID, U.username, U.avatar, L.location_name, S.school_name, U.reply_num, U.post_num FROM users U, locations L, schools S WHERE U.openID = '{$openID}' AND L.location_id = U.location_id AND S.sID = U.school_id";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $result = getDataAsArray($result);
    return $result;
}

function login($openID,$session_key){
    session_start();
    $_SESSION['openID'] = $openID;
    $_SESSION['session_key'] = $session_key;
}

/*
**是否选择了学校的验证
*/
function is_select_school($openID,$conn){
    $sql = "SELECT school_id FROM users WHERE openID = '$openID'";
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    $bool = $result[0]->school_id;
    if($bool){
        return true;
    }else{
        return false;
    }
}

/**
 * 最近浏览的五篇文章的相同标签的文章
 */
function recent_similar($openID,$conn,$latitude,$longitude){
    //echo "nb1";
    $temp = $latitude * $latitude + $longitude * $longitude;
    $sql = "SELECT AR.aID,A.Labels 
    FROM article_records AR, articles A 
    WHERE AR.openID = '$openID' 
    AND A.aID = AR.aID 
    AND Labels IS NOT NULL
    ORDER BY AR.time DESC
    LIMIT 0,5";
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    $condition = '';
    $i = 0;
    $num = count($result);
    //echo $sql;
    //echo $num;
    foreach($result as $value){
        if($i == 0){
            $condition = "(";
        }

        
        $tempLabels = $value->Labels;
        $tempLabelArray = explode(",",$tempLabels);

        //echo $num;
        $tempCount = count($tempLabelArray);
        for($j = 0 ; $j < $tempCount ; ++ $j){
            //echo "A.Labels LIKE %{$tempLabelArray[$j]}% ";
            if($tempLabelArray[$j] == ''){
                ++ $j;
                continue;
            }
            $condition .= "A.Labels LIKE '%{$tempLabelArray[$j]}%' ";
            //echo $tempLabelArray[$j];
            //echo $condition;
            if($j + 1 == $tempCount && $i + 1 == $num){
                break(2);
                //echo "nb";
                //到头了，不加OR了
            }else{
                $condition .= "OR ";
            }
        }

        //echo $condition;
        ++ $i;
        // if($i == $num){
            
        // }

    }
    //echo $condition;
    if($condition != ''){
        $condition .= ")";
        $sql = "SELECT A.aid AS ID, 
        A.content, 
        A.comment_num,
        A.type_id,
        T.type_name, 
        A.hot, 
        U.username, 
        U.avatar, 
        U.account_type,
        A.time, 
        U.openID,
        A.comment_num, 
        S.school_name, 
        S.location_id, 
        A.latitude,
        A.longitude,
        A.address,
        A.labels,
        (((A.latitude * A.latitude) + (A.longitude * A.longitude)) - {$temp}) AS distance
       FROM articles A, users U, article_types T ,schools S
       WHERE T.type_id = A.type_id 
       AND U.openID = A.openID 
       AND S.sID = U.school_id
       AND {$condition}
       ORDER BY A.hot DESC 
       LIMIT 0,10";
        //echo $sql;
       $result = mysqli_query($conn,$sql);
       $result = getDataAsArray($result);
    }else{
        $result = [];
    }

    $newResult = [];
    foreach($result as $value){
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
        $value->pictures = get_article_picture($value->ID,$conn);
        $newResult[] = $value;
    }
    return $newResult;
}


/**
 * 最近浏览的五篇文章的相同标签
 */
function recent_labels($openID,$conn){
    $sql = "SELECT COUNT(*) AS num FROM article_records WHERE openID = '{$openID}'";
    $result = getDataAsArray(mysqli_query($conn,$sql));
    //echo $sql;
    $num = $result[0]->num;
    //var_dump($result);
    //exit;
    
    //echo "nb1";
    $sql = "SELECT AR.aID,A.Labels 
    FROM article_records AR, articles A 
    WHERE AR.openID = '$openID' 
    AND A.aID = AR.aID 
    AND Labels IS NOT NULL
    ORDER BY AR.time DESC
    LIMIT 0,10";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    $temp = [];
    foreach($result as $value){
        $tempLabels = $value->Labels;
        $tempLabelArray = explode(",",$tempLabels);
        $tempCount = count($tempLabelArray);
        for($j = 0 ; $j < $tempCount ; ++ $j){
            //echo "nb";
            if(!in_array($tempLabelArray[$j],$temp) && $tempLabelArray[$j] != ""){
                //echo "nb";
                $temp [] = $tempLabelArray[$j];
            }
        }
    }

    if($num == 0 || count($temp) == 0){
        //没有浏览过帖子，或者最近浏览的帖子没有标签
        $sql = "SELECT AR.aID,A.Labels 
        FROM article_records AR, articles A 
        WHERE A.aID = AR.aID 
        AND Labels IS NOT NULL
        ORDER BY AR.time DESC
        LIMIT 0,10";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        $result = getDataAsArray($result);
        $temp = [];
        foreach($result as $value){
            $tempLabels = $value->Labels;
            $tempLabelArray = explode(",",$tempLabels);
            $tempCount = count($tempLabelArray);
            for($j = 0 ; $j < $tempCount ; ++ $j){
                //echo "nb";
                if(!in_array($tempLabelArray[$j],$temp) && $tempLabelArray[$j] != ""){
                    //echo "nb";
                    $temp [] = $tempLabelArray[$j];
                }
            }
        }

    }
    return $temp;
}

/**
 * 最近浏览的五个商品的相同标签
 */
function recent_item_labels($openID,$conn){
    $sql = "SELECT COUNT(*) FROM articles_records WHERE openID = '{$openID}'";
    $result = getDataAsArray(mysqli_query($conn,$sql));
    //var_dump($result);
    //exit;
    //if()
    //echo "nb1";
    $sql = "SELECT AR.aID,A.Labels 
    FROM article_records AR, articles A 
    WHERE AR.openID = '$openID' 
    AND A.aID = AR.aID 
    AND Labels IS NOT NULL
    ORDER BY AR.time DESC
    LIMIT 0,10";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    $temp = [];
    foreach($result as $value){
        $tempLabels = $value->Labels;
        $tempLabelArray = explode(",",$tempLabels);
        $tempCount = count($tempLabelArray);
        for($j = 0 ; $j < $tempCount ; ++ $j){
            //echo "nb";
            if(!in_array($tempLabelArray[$j],$temp) && $tempLabelArray[$j] != ""){
                //echo "nb";
                $temp [] = $tempLabelArray[$j];
            }
        }
    }
    return $temp;
}



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