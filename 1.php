<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>123</title>
</head>
<body>
<form action='' method='get'>
    文本框:<input type='text' name='text'>
    <input type='submit' value='提交',name='sub'>
</form>
<p>
    <?php
    if(!empty($_GET['sub'])){
        echo $_GET['text'];
    }
    ?>
</p>

</body>
</html>