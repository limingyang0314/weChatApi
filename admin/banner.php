<html>
<head>
<meta charset="utf-8">
<title>上传banner</title>
</head>
<body>

<form action="../api/pictures.php?secondType=upload_banner" method="post" enctype="multipart/form-data">
    <label for="first_typeID">大类ID：</label>
    <input type="text" name="first_typeID" id="first_typeID"><br>
    <label for="first_typeID">小类ID：</label>
    <input type="text" name="second_typeID" id="second_typeID"><br>
    <label for="file">图片：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
</form>

</body>
</html>
