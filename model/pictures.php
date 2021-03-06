<?php
require_once 'mysql.php';

/*
**处理查询结果
*/
function finish_picture_select($type, $result){
    $result = getDataAsArray($result);
    return $result;
}

/*
**上传成功的article or item picture插入数据库
*/
function other_upload_into_db($type,$pointerID,$file_name,$conn){
    $id = null;
    if($type == 'item_pictures'){
        $id = 'iID';
    }
    if($type == 'article_pictures'){
        $id = 'aID';
    }
    $url = "/upload/{$type}/{$file_name}";
    $sql = "INSERT INTO {$type} ($id, pName, pURL) 
    VALUES ('{$pointerID}','{$file_name}','{$url}')";
    //echo $sql;
    //exit;
    $result = mysqli_query($conn, $sql);
}


/*
**上传成功的banner插入数据库
*/
function banners_upload_into_db($type,$file_name,$first_typeID,$second_typeID,$conn){
    //include 'mysql.php';
    $sql = "INSERT INTO {$type} (b_name,first_typeID,second_typeID) 
    VALUES ('{$file_name}','{$first_typeID}','{$second_typeID}')";
    //echo $sql;
    //exit;
    //$conn->query($sql);
    mysqli_query($conn, $sql);
}

function banner_words_upload_into_db($type,$file_name,$first_typeID,$second_typeID,$conn){
    $url = "upload/banner_words/" . $file_name;
    $sql = "INSERT INTO {$type} (url,first_TypeID,second_TypeID) 
    VALUES ('{$url}','{$first_typeID}','{$second_typeID}')";
    //echo $sql;
    //exit;
    mysqli_query($conn, $sql);
}

/*
**处理上传的图片
*/
function upload_picture($type,$conn,$file,$pointerID = null,$first_typeID = null, $second_typeID = null, $order = 1){
    $max_size = 524288;
    if($type == 'banners'){
        $max_size = 2048000;
    }
    //echo "second_typeID is " . $second_typeID . "<br>";
    $allowedTypes = array("banners", "item_pictures", "article_pictures", "banner_words");
    if(!in_array($type,$allowedTypes)){
        //echo "非法上传类型!";
        exit;
    }
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $file["name"]);
    //echo $file["size"];
    $extension = end($temp);     // 获取文件后缀名
    if ((($file["type"] == "image/gif")
       || ($file["type"] == "image/jpeg")
       || ($file["type"] == "image/jpg")
       || ($file["type"] == "image/pjpeg")
       || ($file["type"] == "image/x-png")
       || ($file["type"] == "image/png"))
       && ($file["size"] < $max_size)   // 小于 200 kb
       && in_array($extension, $allowedExts))
        {
        if ($file["error"] > 0)
        {
            //echo "错误：: " . $file["error"] . "<br>";
            }else{
                // echo "上传文件名: " . $file["name"] . "<br>";
                // echo "文件类型: " . $file["type"] . "<br>";
                // echo "文件大小: " . ($file["size"] / 1024) . " kB<br>";
                // echo "文件临时存储的位置: " . $file["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        
                $file["name"] = "{$type}_".time()."_{$order}".".".$extension;
                if (file_exists("upload/{$type}/" . $file["name"])){
                    //echo $file["name"] . " 文件已经存在。 ";
                }else{
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    move_uploaded_file($file["tmp_name"], "../upload/{$type}/" . $file["name"]);
                    //echo "文件存储在: " . "upload/{$type}/" . $file["name"];
                    if($type == 'banners'){
                        banners_upload_into_db($type,$file["name"],$first_typeID,$second_typeID,$conn);
                    }else if($type == 'banner_words'){
                        banner_words_upload_into_db($type,$file["name"],$first_typeID,$second_typeID,$conn);
                    }else{
                        other_upload_into_db($type,$pointerID,$file["name"],$conn);
                    }
                    
                }
            }
        }else{
            echo "非法的文件格式";
        }

    }

    /*
    **获取数量为number的最近banner
    */
    function get_banners($number,$conn){
        $theLastIndex = $number;
        $sql = "SELECT * FROM banners ORDER BY time DESC LIMIT 0,{$theLastIndex}";
        $result = mysqli_query($conn,$sql);
        return finish_picture_select('banners',$result);
    }

        /*
    **获取数量为number的最近banner
    */
    function get_banners_by_type($first_type,$second_type,$conn){
        //$theLastIndex = $number;
        $sql = "SELECT * FROM banners 
        WHERE first_typeID = $first_type 
        AND second_typeID = $second_type 
        ORDER BY time DESC";
        $result = mysqli_query($conn,$sql);
        return finish_picture_select('banners',$result);
    }

    /*
    **删除id标注的banner
    */
    function delete_banners($id,$conn){
        $sql = "SELECT b_name FROM banners WHERE bID = {$id}";
        $result = mysqli_query($conn,$sql);
        $result = getDataAsArray($result);
        //var_dump($result);
        $filename = $result[0]->b_name;
        //echo $filename;
        $filename = "../upload/banners/" . $filename;
        //echo $filename;
        $sql = "DELETE FROM banners WHERE bID = {$id}";
        $result = mysqli_query($conn,$sql);
        unlink($filename);
        return "我觉得ok";
    }

    // /*
    // **根据pID获取文章内的图片
    // */
    // function get_article_picture($pID){

    // }

    // /*
    // **根据pID获取商品内的图片
    // */
    // function get_item_picture($pID){

    // }