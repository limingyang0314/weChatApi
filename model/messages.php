<?php 
 require_once "mysql.php";

/*
**根据openID获取某个用户收到的所有消息
*/
function get_message_by_openID($openID, $conn){

}

/*
**将某条消息标为已读
*/
function set_had_read($mID, $conn){

}

/*
**删除某条消息
*/
function delete_message($mID, $conn){
    
}

/*
**增加一条回复类型的消息
*/
function add_comment_message($from, $to, $aID, $cID, $conn){

}

/*
**增加一条普通的站内私信
*/
function add_ordinary_message($from, $to, $comment, $conn){

}
