<?php

//不要笑话这个后台登陆验证太简单，我只是占个坑而已，以后再实现真的验证
   if(isset($_POST['name']) && isset($_POST['pw'])){
       if($_POST['name'] == 'root' && $_POST['pw'] == 'lmy0314'){
           //echo "hello world!\n";
           $_COOKIE['user'] = 'root';
           header('Location: http://127.0.0.1:8080/admin/banner.php');
       }
   }
?>

<html>
<head>
<meta charset="utf-8">
<title>管理后台登陆</title>
</head>
<body>
 
<center><form action="login.php" method="post"><br><br>后台管理系统<br><br><br>
用户名: <input type="text" name="name"><br><br>
密&nbsp&nbsp&nbsp&nbsp码: <input type="password" name="pw"><br><br>
<input type="submit" value="登陆">
</form></center>
 
</body>
</html>