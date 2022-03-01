<?php
include_once 'header.php';

$id = filterstr($_GET['id']);
$result = $conn->query("select * from cate where id = '$id'");
$row = $result->fetch_assoc();

if ($_POST['sub']){
    $title = filterstr($_POST['title']);
    $conn -> query("update cate set class_name='$title' where id = '$id'");

    if ($conn->affected_rows>0){
        redirect('2','cate_list.php','修改成功');

    }else{
        redirect('2','cate_edit.php','修改失败');

    }

}

?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="cate_list.php">栏目管理</a><span class="crumb-step">&gt;</span><span>编辑栏目</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                            <tr>
                                <th><i class="require-red">*</i>栏目：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo $row['class_name']; ?>" type="text">
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
