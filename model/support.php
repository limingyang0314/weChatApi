<?php
require_once "mysql.php";

/*
**联系我们
*/
function contact_us($content,$contact_way){
    $stmt = $GLOBALS['conn_obj']->prepare("INSERT INTO contact_us (content,contact_way) VALUES (?,?)");
    $stmt->bind_param('ss',$content,$contact_way);
    $stmt->execute();
    $result = $stmt->store_result();
    //$GLOBALS['conn_obj']->
    if($result){
        return array('留言成功！');
    }else{
        return array('留言失败！');
    }

}