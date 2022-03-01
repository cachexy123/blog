<?php
include_once 'init.php';

if ($_POST['sub']){
    $username = filterstr($_POST['username']);
    $password = md5(filterstr($_POST['password']));
    $result = $conn->query("select * from users where username = '$username' and password = '$password'");
    if ($result -> num_rows > 0){

        $row = $result->fetch_assoc();
        if ($row['password'] == $password){
            $_SESSION['username'] = $row['username']; //session
            header('Location: main.php'); //跳转
            $conn->close();
        }else{
            echo "<script>alert('用户或密码错误')</script>";
        }
    }else{
        echo "<script>alert('用户或密码错误')</script>";
    }
}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>『博客』后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/admin_login.css"/>
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="#" method="post" onsubmit="return check(this)">
                <ul class="admin_items">
                    <li>
                        <label for="username">用户名：</label>
                        <input type="text" name="username" id="username" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="password">密码：</label>
                        <input type="password" name="password" id="password" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" name="sub" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#" target="_blank">返回首页</a> &copy; 2021 Powered by cachexy：<a href="http://www.mycodes.net/" target="_blank">cachexy</a></p>
</div>
<script>
    //form 是随便命名的,一般写标签的同名
    function check(form) {
        var username = form.username.value;
        if (username.lenth == 0){
            alert("用户不能为空")
            form.username.focus();
            return false;
        }
        var password = form.password.value;
        if (password.lenth == 0){
            alert("密码不能为空")
            form.password.focus();
            return false;
        }
        return true;
    }
</script>
</body>
</html>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>管理员登录</title>-->
<!--    <style>-->
<!--        .login{-->
<!--            width: 400px;-->
<!--            margin: 0px auto;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <div class="login">-->
<!--        <form method="post" onsubmit="return check(this)">-->
<!--            <table>-->
<!--                <tr><td><laber for="username">用户</laber></td><td><input type="text" name="username" id="username"></td></tr>-->
<!--                <tr><td><laber for="password">密码</laber></td><td><input type="password" name="password" id="password"></td></tr>-->
<!--                <tr><td colspan="2"><input type="submit" value="登录" name="sub"></td></tr>-->
<!---->
<!--            </table>-->
<!--        </form>-->
<!--    </div>-->
<!--    <script>-->
<!--        //form 是随便命名的,一般写标签的同名-->
<!--        function check(form) {-->
<!--            var username = form.username.value;-->
<!--            if (username.lenth == 0){-->
<!--                alert("用户不能为空")-->
<!--                form.username.focus();-->
<!--                return false;-->
<!--            }-->
<!--            var password = form.password.value;-->
<!--            if (password.lenth == 0){-->
<!--                alert("密码不能为空")-->
<!--                form.password.focus();-->
<!--                return false;-->
<!--            }-->
<!--            return true;-->
<!--        }-->
<!--    </script>-->
<!--</body>-->
<!--</html>-->
