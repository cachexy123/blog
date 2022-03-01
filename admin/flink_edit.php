<?php
include_once 'header.php';

$id = filterstr($_GET['id']);
$result = $conn->query("select * from flink where id = '$id'");
$row = $result->fetch_assoc();

if ($_POST['sub']){
    $url_name = filterstr($_POST['url_name']);
    $url = filterstr($_POST['url']);
    $conn -> query("update flink set url_name='$url_name',url = '$url' where id = '$id'");

    if ($conn->affected_rows>0){
        redirect('2','flink_list.php','修改成功');

    }else{
        redirect('2','flink_edit.php','修改失败');

    }

}

?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="flink_list.php">友情链接</a><span class="crumb-step">&gt;</span><span>编辑友情链接</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                            <tr>
                                <th><i class="require-red">*</i>网站名称：</th>
                                <td>
                                    <input class="common-text required" id="url_name" name="url_name" size="50" value="<?php echo $row['url_name']; ?>" type="text">
                                </td>

                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>url：</th>

                                <td>
                                    <input class="common-text required" id="url" name="url" size="50" value="<?php echo $row['url']; ?>" type="text">
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
