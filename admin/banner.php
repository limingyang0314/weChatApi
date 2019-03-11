<html>
<head>
<meta charset="utf-8">
<title>上传banner</title>
</head>
<body>

<form action="../api/pictures.php?secondType=upload_banner" method="post" enctype="multipart/form-data">
    <label for="file">图片名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
</form>

</body>
</html>

<?php
   if($_COOKIE['user'] != 'root'){
       
   }
?>