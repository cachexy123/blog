<?php
include_once 'header.php';


if ($_POST['sub']){
    $password = md5(filterstr($_POST['password']));
    $conn -> query("update users set password = '$password' where username = '$_SESSION[username]'");

    if ($conn->affected_rows>0){
        redirect('2','main.php','修改成功');

    }else{
        redirect('2','users_edit.php','修改失败');

    }

}

?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">友情链接</a><span class="crumb-step">&gt;</span><span>编辑栏目</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                            <tr>
                                <th><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input class="common-text required" id="password" name="password" size="50" type="password">
                                </td>

                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" name="sub" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>

</body>
</html>
