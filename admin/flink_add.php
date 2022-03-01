<?php
include_once 'header.php';

if ($_POST['sub']){
    $url_name = filterstr($_POST['url_name']);
    $url = filterstr($_POST['url']);
    $conn -> query("insert into flink (url_name,url) value ('$url_name','$url')");

    if ($conn->affected_rows>0){
        redirect('2','flink_list.php','添加成功');
    }else{
        redirect('2','flink_add.php','添加失败');
    }

}

?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="flink_list.php">友情链接管理</a><span class="crumb-step">&gt;</span><span>新增友情链接</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                            <tr>
                                <th><i class="require-red">*</i>网站名称：</th>
                                <td>
                                    <input class="common-text required" id="url_name" name="url_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网站url：</th>
                                <td>
                                    <input class="common-text required" id="url" name="url" size="50" value="" type="text">
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
