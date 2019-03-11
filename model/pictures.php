<?php
include 'mysql.php';

/*
**处理查询结果
*/
function finish_picture_select($type, $result){
    $result = getDataAsArray($result);
    return $result;
}


/*
**上传成功的图片插入数据库
*/
function upload_into_db($type,$file_name,$conn){
    //include 'mysql.php';
    $sql = "INSERT INTO {$type} (b_name) VALUES ('{$file_name}')";
    $conn->query($sql);
}

/*
**处理上传的图片
*/
function upload_picture($type,$conn){
    $allowedTypes = array("banners", "item_pictures", "article_pictures");
    if(!in_array($type,$allowedTypes)){
        echo "非法上传类型!";
        exit;
    }
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    echo $_FILES["file"]["size"];
    $extension = end($temp);     // 获取文件后缀名
    if ((($_FILES["file"]["type"] == "image/gif")
       || ($_FILES["file"]["type"] == "image/jpeg")
       || ($_FILES["file"]["type"] == "image/jpg")
       || ($_FILES["file"]["type"] == "image/pjpeg")
       || ($_FILES["file"]["type"] == "image/x-png")
       || ($_FILES["file"]["type"] == "image/png"))
       && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
       && in_array($extension, $allowedExts))
        {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            }else{
                echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
                echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
                echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        
                $_FILES["file"]["name"] = "banner_".time().".".$extension;
                if (file_exists("upload/{$type}/" . $_FILES["file"]["name"])){
                    echo $_FILES["file"]["name"] . " 文件已经存在。 ";
                }else{
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/{$type}/" . $_FILES["file"]["name"]);
                    echo "文件存储在: " . "upload/{$type}/" . $_FILES["file"]["name"];
                    upload_into_db($type,$_FILES["file"]["name"],$conn);
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
        $sql = "SELECT * FROM banners ORDER BY time DESC";
        $result = mysqli_query($conn,$sql);
        return finish_picture_select('banners',$result);
    }

    /*
    **删除id标注的banner
    */
    function delete_banners($id,$conn){
    $sql = "DELETE FROM banners WHERE bID = {$id}";
        $result = mysqli_query($conn,$sql);
        return "我觉得ok";
    }

    /*
    **根据pID获取文章内的图片
    */
    function get_article_picture($pID){

    }

    /*
    **根据pID获取商品内的图片
    */
    function get_item_picture($pID){

    }