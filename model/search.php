<?php
require_once 'mysql.php';

  function search($type,$key,$limit,$page,$conn){
    $keys = explode(',',$key);
    if($type == 1){
        $sql = get_article_sql($keys,$limit,$page);
    }else if($type == 2){
        $sql = get_item_sql($keys,$limit,$page);
    }
    $result = select_result($sql, $conn);
    $result = getDataAsArray($result);
    return $result;
  }

  function get_article_sql($keys,$limit,$page){
      $sql = "SELECT U.username, U.avatar, A.aID, A.content FROM articles A,users U WHERE U.openID = A.openID AND (";
      $num = sizeof($keys);
      $count = 0;
      $start = $limit * ($page - 1);
      //$end = 
      foreach($keys as $value){
          $count ++;
          $sql .= "content LIKE '%$value%'";
          if($count < $num){
              $sql .= " OR ";
          }else{
              $sql .= ") ORDER BY time DESC LIMIT {$start},{$limit}";
          }

      }
      //echo $sql;
      //exit;
      return $sql;
  }

  function get_item_sql($keys,$limit,$page){
    $start = $limit * ($page - 1);
    $sql = "SELECT U.username, U.avatar, iID, item_info FROM items I,users U WHERE U.openID = I.openID AND (";
    $num = sizeof($keys);
    $count = 0;
    foreach($keys as $value){
        $count ++;
        $sql .= "item_info LIKE '%$value%'";
        if($count < $num){
            $sql .= " OR ";
        }else{
            $sql .= ") ORDER BY time DESC LIMIT {$start},{$limit}";
        }
    }
    //echo $sql;
    //exit;
    return $sql;
  }

  function select_result($sql, $conn){
      $result = mysqli_query($conn,$sql);
      return $result;
  }


//   $keys = "这是,土豆,西瓜,hole";
//   search(2,$keys);