<?php
require_once 'mysql.php';

  function search($openID,$type,$key,$limit,$page,$conn){
    $keys = explode(',',$key);
    
    if($type == 1){
        $sql = get_article_sql($keys,$limit,$page);
    }else if($type == 2){
        $sql = get_item_sql($keys,$limit,$page);
    }else if($type == 0){
        $result = select_all_info($keys,$limit,$conn);
        return $result;
    }
    $result = select_result($sql, $conn);
    $result = getDataAsArray($result);
    //if(!empty($result)){
        $insert_sql = "INSERT INTO search_history (openID,history) VALUES ('{$openID}','{$key}')";
        mysqli_query($conn,$insert_sql);
    //}
    return $result;
  }

  function select_all_info($keys,$limit,$conn){
    $article_sql = get_article_sql($keys,$limit,1);
    $article_result = select_result($article_sql, $conn);
    $article_result = getDataAsArray($article_result);
    //var_dump($item_result);
    //var_dump($article_result);

    $item_sql = get_item_sql($keys,$limit,1);
    $item_result = select_result($item_sql, $conn);
    $item_result = getDataAsArray($item_result);

    $num = $limit;
    $result = [];
    $article_num = count($article_result);
    //var_dump($article_num);
    $article_pointer = 0;
    $item_num = count($item_result);
    $item_pointer = 0;
    //var_dump($item_result);
    //var_dump($article_result);
    for($i = 0 ; $i < $num ; $i ++){
        //echo $i . " ";
        if(count($article_result) > 0){
            $current_a = $article_result[$article_pointer];
            $current_a->main_type = 'article';
        }else{
            $current_a = (object)[];
            $current_a->time = 0;
        }

        if(count($item_result) > 0){
            $current_i = $item_result[$item_pointer];
            $current_i->main_type = 'item';
        }else{
            $current_b = (object)[];
            $current_b->time = 0;
        }

        if(count($item_result) == 0 && count($article_result) == 0){
            break;
        }



        //item提前耗尽
        if($item_pointer == ($item_num - 1 ) || $item_num == 0){
            if($article_pointer < ($article_num - 1 ) && $article_num != 0){
                for($j = $article_pointer ; $j < $article_num ; $j ++){
                    $current_a = $article_result[$article_pointer];
                    $current_a->main_type = 'article';
                    $result[] = $current_a;
                    $article_pointer ++;
                    $i ++;
                }
            }

            break;
        }
        //article提前耗尽
        if( $article_pointer == ($article_num - 1 ) || $article_num == 0){
            if($item_pointer < ($item_num - 1) && $item_num != 0){
                for($j = $article_pointer ; $j < $article_num ; $j ++){
                    $current_i = $item_result[$item_pointer];
                    $current_i->main_type = 'item';
                    $result[] = $current_i;
                    $item_pointer ++;
                    $i ++;
                }
            }
            
            break;

        }
        //echo $i . " in main ";
        if($current_a->time >= $current_i->time){
            $result[] = $current_a;
            $article_pointer ++;
        }else{
            $result[] = $current_i;
            $item_pointer ++;
        }
    }
    //exit;
    if($num > count($result)){
        $num = count($result);
    }
    $result_true = [];
    // echo $num;
    // var_dump($result);
    // exit;
    for($m = 0 ; $m < $num ; $m ++){
        $result_true[] = $result[$m];
    }
    return $result_true;
  }

  function get_article_sql($keys,$limit,$page){
      $sql = "SELECT U.username, U.avatar,S.school_name,A.type_id, AT.type_name,A.aID, A.time, A.content , A.Labels
      FROM articles A,users U, schools S, article_types AT
      WHERE U.openID = A.openID AND S.sID = U.school_id AND AT.type_id = A.type_id
      AND (";
      $num = sizeof($keys);
      $count = 0;
      $start = $limit * ($page - 1);
      //$end = 
      foreach($keys as $value){
          $count ++;
          $sql .= "(content LIKE '%$value%' OR labels LIKE '%$value%')";
          if($count < $num){
              $sql .= " OR ";
          }else{
              $sql .= ") ORDER BY time DESC LIMIT {$start},{$limit}";
          }

      }
      echo $sql;
      exit;
      return $sql;
  }

  function get_item_sql($keys,$limit,$page){
    $start = $limit * ($page - 1);
    $sql = "SELECT U.username, U.avatar,S.school_name,I.iType_ID, I.iID, IT.type_name, I.time, I.item_info, I.labels
    FROM items I,users U, schools S, item_types IT
    WHERE U.openID = I.openID  AND S.sID = U.school_id AND IT.type_id = I.iType_ID
    AND (";
    $num = sizeof($keys);
    $count = 0;
    foreach($keys as $value){
        $count ++;
        $sql .= "(item_info LIKE '%$value%' OR labels LIKE '%$value%')";
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
      //echo $sql;
      //echo "<br>";
      $result = mysqli_query($conn,$sql);
      return $result;
  }


//   $keys = "这是,土豆,西瓜,hole";
//   search(2,$keys);

function get_search_history($openID,$num,$conn){
    $sql = "SELECT H.time, H.history 
    FROM search_history H 
    WHERE openID = '$openID'
    ORDER BY H.time 
    DESC LIMIT 0,{$num}";
   // echo $sql;
    $result = mysqli_query($conn, $sql);
    $result = getDataAsArray($result);
    return $result;
}